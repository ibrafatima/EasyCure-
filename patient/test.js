const url = 'https://vibhawdoctorapi.onrender.com/predict';
const payload = {
  symptoms: ["itching", "skin_rash", "nodal_skin_eruptions"]
};

fetch(url, {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json'
  },
  body: JSON.stringify(payload)
})
.then(response => response.json())
.then(data => {
  console.log('Predicted disease:', data.predicted_disease);
})
.catch(error => {
  console.error('Error:', error);
});