// Get the button:
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

function clearForm() {
    document.getElementById('headline').value = '';
    document.getElementById('article').value = '';
    document.getElementById('predictionText').innerText = '';
    document.getElementById('confidenceText').innerText = '';
}

function submitForm() {
    // Get form elements
    var yourName = document.getElementById("yourName").value;
    var yourEmail = document.getElementById("yourEmail").value;
    var yourMessage = document.getElementById("yourMessage").value;

    // Check if all fields are filled
    if (yourName && yourEmail && yourMessage) {
        // Show popup
        alert("Your message has been submitted!");

        // Clear form inputs
        document.getElementById("contactForm").reset();
    } else {
        // If any field is empty, show an alert
        alert("Please fill in all fields before submitting.");
    }
}

//prediction function
function predict() {
    const headline = document.getElementById('headline').value;
    const article = document.getElementById('article').value;

    fetch('http://127.0.0.1:5000/predict', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                headline,
                article
            }),
        })
        .then(response => response.json())
        .then(result => {
            console.log(result); // Log the result for debugging

            // if ('prediction' in result && 'confidence' in result) {
            //     document.getElementById('predictionText').innerText = 'Prediction: ' + result.prediction;
            //     // document.getElementById('confidenceText').innerText = 'Confidence: ' + result.confidence;
            //     document.getElementById('confidenceText').innerText = 'Confidence Level: ' + (result.confidence * 100).toFixed(2) + '%';
            // } else {
            //     console.error('Error: Unexpected response structure');
            //     alert('An error occurred while processing the prediction. Please try again.');
            // }
            if ('prediction' in result && 'confidence' in result) {
                // const predictionText = document.getElementById('predictionText').innerText = 'Prediction: ' + result.prediction;
                const predictionText = document.getElementById('predictionText');

                const confidenceText = document.getElementById('confidenceText');
                const confidenceProgressBar = document.getElementById('confidenceProgressBar');
                const confidenceValue = document.getElementById('confidenceValue');
                const confidenceInfo = document.getElementById('confidenceInfo');
                const confidenceLevel = (result.confidence * 100).toFixed(2);

                if (confidenceLevel > 100) {
                    confidenceText.innerText = 'Prediction is not available. Please retry';
                } else {
                    confidenceText.innerText = 'Confidence Level: ' + confidenceLevel + '%';
                    confidenceProgressBar.style.width = confidenceLevel + '%';
                    confidenceValue.innerText = confidenceLevel + '%';
                    predictionText.innerText = 'Prediction: ' + result.prediction;

                    if (result.prediction == "Fake News") {
                        if (confidenceLevel <= 25) {
                            confidenceInfo.innerText = 'The model assigns the lowest confidence level, indicating uncertainty in its prediction. This result falls into the "Unknown" category, and additional verification is recommended.';
                        }
                        if (confidenceLevel > 25 && confidenceLevel <= 50) {
                            confidenceInfo.innerText = 'The model shows a low confidence level, indicating a tendency towards a possibly true prediction. It is advisable to verify the information from other sources.';
                        }
                        if (confidenceLevel > 50 && confidenceLevel <= 75) {
                            confidenceInfo.innerText = 'The model expresses a moderate confidence level, implying a likelihood of the news being possibly fake. Caution is advised, and further investigation is recommended.';
                        }
                        if (confidenceLevel > 75 && confidenceLevel <= 100) {
                            confidenceInfo.innerText = 'The model exhibits a high confidence level, strongly suggesting that the news is likely fake. Vigilance is crucial, and cross-referencing with reliable sources is strongly recommended.';
                        }
                    } else {
                        if (confidenceLevel <= 25) {
                            confidenceInfo.innerText = 'The model assigns the lowest confidence level, indicating uncertainty in its prediction. This result falls into the "Unknown" category, and additional verification is recommended.';
                        }
                        if (confidenceLevel > 25 && confidenceLevel <= 50) {
                            confidenceInfo.innerText = 'The model displays a low confidence level, suggesting a possibility of the news being fake. It is advisable to cross-verify the information for accuracy.';
                        }
                        if (confidenceLevel > 50 && confidenceLevel <= 75) {
                            confidenceInfo.innerText = 'The model expresses a moderate confidence level, implying a likelihood of the news being possibly true. It is recommended to verify the information using additional sources.';
                        }
                        if (confidenceLevel > 75 && confidenceLevel <= 100) {
                            confidenceInfo.innerText = 'The model demonstrates a high confidence level, strongly suggesting that the news is likely true. However, maintaining a critical perspective and verifying information from multiple reliable sources is advised.';
                        }
                    }

                    // if (confidenceText == "Fake News") {
                    //     if (confidenceValue <= 25) {
                    //         confidenceText.innerText = 'Confidence Level: ' + confidenceLevel + '%';
                    //         confidenceProgressBar.style.width = confidenceLevel + '%';
                    //         confidenceValue.innerText = confidenceLevel + '%';
                    //         confidenceInfo.innerText = '0 - 25';
                    //     } else if (confidenceValue > 25 && confidenceValue <= 50) {
                    //         confidenceText.innerText = 'Confidence Level: ' + confidenceLevel + '%';
                    //         confidenceProgressBar.style.width = confidenceLevel + '%';
                    //         confidenceValue.innerText = confidenceLevel + '%';
                    //         confidenceInfo.innerText = '25 - 50';
                    //     } else if (confidenceValue > 50 && confidenceValue <= 75) {
                    //         confidenceText.innerText = 'Confidence Level: ' + confidenceLevel + '%';
                    //         confidenceProgressBar.style.width = confidenceLevel + '%';
                    //         confidenceValue.innerText = confidenceLevel + '%';
                    //         confidenceInfo.innerText = '50 - 75';
                    //     } else if (confidenceValue > 75 && confidenceValue <= 100) {
                    //         confidenceText.innerText = 'Confidence Level: ' + confidenceLevel + '%';
                    //         confidenceProgressBar.style.width = confidenceLevel + '%';
                    //         confidenceValue.innerText = confidenceLevel + '%';
                    //         confidenceInfo.innerText = '75 - 100';
                    //     }
                    // }
                    // if (confidenceText == "True News") {
                    //     if (confidenceValue <= 25) {
                    //         confidenceText.innerText = 'Confidence Level: ' + confidenceLevel + '%';
                    //         confidenceProgressBar.style.width = confidenceLevel + '%';
                    //         confidenceValue.innerText = confidenceLevel + '%';
                    //         confidenceInfo.innerText = '0 - 25';
                    //     } else if (confidenceValue > 25 && confidenceValue <= 50) {
                    //         confidenceText.innerText = 'Confidence Level: ' + confidenceLevel + '%';
                    //         confidenceProgressBar.style.width = confidenceLevel + '%';
                    //         confidenceValue.innerText = confidenceLevel + '%';
                    //         confidenceInfo.innerText = '25 - 50';
                    //     } else if (confidenceValue > 50 && confidenceValue <= 75) {
                    //         confidenceText.innerText = 'Confidence Level: ' + confidenceLevel + '%';
                    //         confidenceProgressBar.style.width = confidenceLevel + '%';
                    //         confidenceValue.innerText = confidenceLevel + '%';
                    //         confidenceInfo.innerText = '50 - 75';
                    //     } else if (confidenceValue > 75 && confidenceValue <= 100) {
                    //         confidenceText.innerText = 'Confidence Level: ' + confidenceLevel + '%';
                    //         confidenceProgressBar.style.width = confidenceLevel + '%';
                    //         confidenceValue.innerText = confidenceLevel + '%';
                    //         confidenceInfo.innerText = '75 - 100';
                    //     }
                    // }
                }
            } else {
                console.error('Error: Unexpected response structure');
                alert('An error occurred while processing the prediction. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while making the prediction. Please try again.');
        });
}
