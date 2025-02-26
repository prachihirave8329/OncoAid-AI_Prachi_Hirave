import cv2
import numpy as np
import tensorflow as tf
import sys

# Load AI Model (Assuming pre-trained)
model = tf.keras.models.load_model("ai_model/cancer_model.h5")

# Load Image for Processing
image_path = sys.argv[1]
image = cv2.imread(image_path, cv2.IMREAD_GRAYSCALE)
image = cv2.resize(image, (224, 224))  # Resize to match AI model input
image = np.expand_dims(image, axis=0) / 255.0  # Normalize

# AI Model Prediction
prediction = model.predict(image)
diagnosis = "Cancer Detected" if prediction[0][0] > 0.5 else "No Cancer Detected"

print(diagnosis)
