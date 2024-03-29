document.addEventListener("DOMContentLoaded", function() {
    fetchStudentData();
});

function fetchStudentData() {
    fetch('fetch_students.php')
        .then(response => response.json())
        .then(data => {
            const studentCardsContainer = document.getElementById('studentCards');
            data.forEach(student => {
                const card = document.createElement('div');
                card.classList.add('card');
                
                const img = document.createElement('img');
                img.src = student.photo; // Use the correct image path
                img.alt = student.name;

                const name = document.createElement('p');
                name.textContent = 'Name: ' + student.name;

                const email = document.createElement('p');
                email.textContent = 'Email: ' + student.email;

                card.appendChild(img);
                card.appendChild(name);
                card.appendChild(email);

                studentCardsContainer.appendChild(card);
            });
        })
        .catch(error => console.error('Error:', error));
}
