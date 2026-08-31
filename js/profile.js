document.addEventListener('DOMContentLoaded', function () {
    const profileIcon = document.getElementById('profileIcon');
    const dropdown = document.getElementById('dropdown');

    // Toggle dropdown visibility on profile icon click
    profileIcon.addEventListener('click', function () {
        dropdown.style.display = dropdown.style.display === 'none' || dropdown.style.display === '' ? 'block' : 'none';
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function (event) {
        if (!profileIcon.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.style.display = 'none';
        }
    });
});