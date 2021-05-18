#importing the required libraries
import cv2
import imutils
import numpy as np
import tensorflow.keras
import json
from flask import Flask, request, render_template
from PIL import Image, ImageOps,ImageTk

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
	# Create the array of the right shape to feed into the keras model
    # The 'length' or number of images you can put into the array is
    # determined by the first position in the shape tuple, in this case 1.
    data = np.ndarray(shape=(1, 224, 224, 3), dtype=np.float32)

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
    idx = np.argmax(prediction)
    final_prediction = classes[idx+1]
    return render_template("result.php",final_prediction = classes[idx+1])




if __name__ == '__main__':
		try:
			port = int(sys.argv[1]) # This is for a command-line input
		except:
			port = 12345 # If we don't provide any port the port will be set to 12345
		app.run(port=port, debug=True)