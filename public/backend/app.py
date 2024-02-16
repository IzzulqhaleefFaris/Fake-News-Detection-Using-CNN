from flask import Flask, request, jsonify
from flask_cors import CORS
from tensorflow import keras
from keras.models import load_model
from keras.preprocessing.sequence import pad_sequences
from keras.preprocessing.text import Tokenizer
from bs4 import BeautifulSoup
import re
import nltk
from nltk.corpus import stopwords
import pickle

app = Flask(__name__)
CORS(app)  # Enable CORS for all routes
# CORS(app, resources={r"/predict": {"origins": "*"}})

# Load Tokenizer
max_features_cnn = 10000
maxlen_cnn = 300
tokenizer_cnn_file = 'C://xampp//htdocs//intelliguard//public//backend//tokenizer_cnn.pkl'

with open(tokenizer_cnn_file, 'rb') as tokenizer_file:
    tokenizer_cnn = pickle.load(tokenizer_file)

model = load_model(
    "C://xampp//htdocs//intelliguard//public//backend//cnn_model.h5"
)

@app.route("/predict", methods=["POST"])
def predict():
    try:
        data = request.get_json()
        print(data)
        headline = data["headline"]
        article = data["article"]

        # Debugging information
        print(f"Original Headline: {headline}")
        print(f"Original Article: {article}")

        processed_data = preprocess_data(headline, article)

        # Debugging information
        print(f"Processed Data: {processed_data}")

        tokenized_data = tokenizer_cnn.texts_to_sequences([processed_data])

        # Debugging information
        print(f"Tokenized Data: {tokenized_data}")

        padded_data = pad_sequences(tokenized_data, maxlen=maxlen_cnn)

        # Debugging information
        print(f"Padded Data: {padded_data}")

        # Make the prediction
        prediction = model.predict(padded_data)[0][0]
        
        # Classify based on a confidence threshold
        threshold = 0.5
        if prediction > threshold:
            result = "Fake News"
        else:
            result = "Real News"

        confidence = abs(prediction - 0.5) * 2  # Normalize confidence to range [0, 1]

        return jsonify({'prediction': result, 'confidence': float(confidence)})

    except Exception as e:
        return jsonify({"error": str(e)})

def preprocess_data(headline, article):
    combined_text = headline + " " + article
    
    # Print the combined text after concatenation
    print(f"Combined Text after Concatenation: {combined_text}")
    
    combined_text = remove_html_tags(combined_text)
    
    # Print the combined text after removing HTML tags
    print(f"Combined Text after Removing HTML Tags: {combined_text}")

    combined_text = remove_special_characters(combined_text)
    
    # Print the combined text after removing special characters
    print(f"Combined Text after Removing Special Characters: {combined_text}")

    tokens = tokenize_text(combined_text)
    
    # Print the tokens after tokenization
    print(f"Tokens after Tokenization: {tokens}")

    cleaned_text = remove_stopwords_and_lemmatization(tokens)
    
    # Print the final tokens after stopword removal and lemmatization
    print(f"Final Tokens after Stopword Removal: {cleaned_text}")

    return cleaned_text


def remove_html_tags(text):
    soup = BeautifulSoup(text, "html.parser")
    return soup.get_text()


def remove_special_characters(text):
    return re.sub("[^a-zA-Z]", " ", text)


def tokenize_text(text):
    # Use a regex to split the text into words
    words = re.findall(r'\b\w+\b', text.lower())
    return words


def remove_stopwords_and_lemmatization(tokens):
    stop_words = set(stopwords.words("english"))
    final_tokens = []

    for token in tokens:
        if token not in stop_words:
            lemma = nltk.WordNetLemmatizer()
            token = lemma.lemmatize(token)
            final_tokens.append(token)

    return " ".join(final_tokens)


if __name__ == "__main__":
    app.run(debug=True)