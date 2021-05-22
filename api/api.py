#importing the required libraries
import cv2
import imutils
import numpy as np
import tensorflow.keras
import json
from flask import Flask, request, render_template
from PIL import Image, ImageOps,ImageTk
import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="hospital"
)

mycursor = mydb.cursor()


#Defining the output classes
classes = {
			1:'GLIOMA TUMOR',
			2:'MENINGIOMA TUMOR',
			3:'NO TUMOR',
			4:'PITUITARY TUMOR'
		   }




# Load the model
model = tensorflow.keras.models.load_model('keras_model.h5')

app = Flask(__name__, template_folder='../doctor')




@app.route('/predict', methods=['GET'])
def model_predict():
	path = request.args.get("imageUrl")
	appointmentId = request.args.get("appointmentId")
	patientId = request.args.get("patientId")
	doctorId = request.args.get("doctorId")
	# Create the array of the right shape to feed into the keras model
	# The 'length' or number of images you can put into the array is
	# determined by the first position in the shape tuple, in this case 1.
	data = np.ndarray(shape=(1, 224, 224, 3), dtype=np.float32)
	path = '../' + path
	# Replace this with the path to your image
	image = Image.open(path)

	#resize the image to a 224x224 with the same strategy as in TM2:
	#resizing the image to be at least 224x224 and then cropping from the center
	size = (224, 224)
	image = ImageOps.fit(image, size, Image.ANTIALIAS)

	#turn the image into a numpy array
	image_array = np.asarray(image)


	# Normalize the image
	normalized_image_array = (image_array.astype(np.float32) / 127.0) - 1

	# Load the image into the array
	data[0] = normalized_image_array

	# run the inference
	prediction = model.predict(data)
	GLIOMA = format(float(prediction[0][0])*100, 'f')
	MENINGIOMA = format(float(prediction[0][1])*100, 'f')
	NOTUMOR = format(float(prediction[0][2])*100, 'f')
	PITUITARY = format(float(prediction[0][3])*100, 'f')
	idx = np.argmax(prediction)
	final_prediction = classes[idx+1]
	if(idx+1 == 1):
		GRADE = 'I'
	elif(idx+1 == 2 or idx+1 == 4):
		GRADE = 'II'
	else:
		GRADE = 0
	print(GRADE)
	#Creating a connection cursor
	mycursor.execute("SELECT * FROM patient_appointment A,patient P WHERE doctor_id =" + doctorId + "  AND A.patient_id = " + patientId + " AND appointment_id = " + appointmentId + " AND A.patient_id = P.patient_id;")
	myresult = mycursor.fetchone()
	img = Image.open(path)
	curImg = 0
	Img = 0
	Img = np.array(img)
	curImg = np.array(img)
	gray = cv2.cvtColor(np.array(img), cv2.COLOR_BGR2GRAY)
	ret, thresh = cv2.threshold(gray, 0, 255, cv2.THRESH_BINARY_INV + cv2.THRESH_OTSU)
	kernel = np.ones((3, 3), np.uint8)
	opening = cv2.morphologyEx(thresh, cv2.MORPH_OPEN, kernel, iterations=2)
	cv2.imwrite('../images/noise.png',opening)
	curImg = opening
	sure_bg = cv2.dilate(curImg, kernel, iterations=3)
	# Finding sure foreground area
	dist_transform = cv2.distanceTransform(curImg, cv2.DIST_L2, 5)
	ret, sure_fg = cv2.threshold(dist_transform, 0.7 * dist_transform.max(), 255, 0)
	sure_fg = np.uint8(sure_fg)
	unknown = cv2.subtract(sure_bg, sure_fg)
	# Marker labelling
	ret, markers = cv2.connectedComponents(sure_fg)
	markers = markers + 1
	markers[unknown == 255] = 0
	markers = cv2.watershed(Img, markers)
	Img[markers == -1] = [255, 0, 0]
	tumorImage = cv2.cvtColor(Img, cv2.COLOR_HSV2BGR)
	cv2.imwrite('../images/tumor-location.png',tumorImage)
	return render_template("result.php",final_prediction = classes[idx+1], data = myresult
		,glioma = GLIOMA, meningioma = MENINGIOMA,notumor = NOTUMOR,pituitary = PITUITARY
		,grade = GRADE)




if __name__ == '__main__':
		try:
			port = int(sys.argv[1]) # This is for a command-line input
		except:
			port = 12345 # If we don't provide any port the port will be set to 12345
		app.run(port=port, debug=True)