// Hospital data for search functionality
const hospitalsData = [
    { name: 'City Hospital', details: { address: '123 Main St', totalRooms: 100, availableRooms: 30 } },
    { name: 'Green Valley Hospital', details: { address: '456 Valley Rd', totalRooms: 120, availableRooms: 40 } },
    { name: 'Sunshine Medical Center', details: { address: '789 Sunshine Blvd', totalRooms: 80, availableRooms: 20 } }
  ];
  
  // Function to filter hospitals based on search input
  function filterHospitals() {
    const searchInput = document.getElementById('search-input').value.toLowerCase();
    const hospitalList = document.getElementById('hospitalList');
    hospitalList.innerHTML = '';
  
    const filteredHospitals = hospitalsData.filter(hospital =>
      hospital.name.toLowerCase().includes(searchInput)
    );
  
    filteredHospitals.forEach(hospital => {
      const listItem = document.createElement('li');
      listItem.textContent = hospital.name;
      listItem.style.cursor = 'pointer';
      listItem.onclick = () => showHospitalDetails(hospital);
      hospitalList.appendChild(listItem);
    });
  }
  
  // Function to show hospital details
  function showHospitalDetails(hospital) {
    alert(`Hospital Name: ${hospital.name}\nAddress: ${hospital.details.address}\nTotal Rooms: ${hospital.details.totalRooms}\nAvailable Rooms: ${hospital.details.availableRooms}`);
  }
  
  // Prevent dropdown from closing when clicking inside it
  document.getElementById('searchHospitalSection').addEventListener('click', (event) => {
    event.stopPropagation();
  });
  
  // Toggle dropdown visibility
  function toggleSearchDropdown(event) {
    event.stopPropagation(); // Prevent click from propagating to the document
    const searchHospitalSection = document.getElementById('searchHospitalSection');
    searchHospitalSection.classList.toggle('visible');
  }
  
  // Close dropdown when clicking outside
  function closeSearchDropdown(event) {
    const searchHospitalBtn = document.getElementById('search-hospital-btn');
    const searchHospitalSection = document.getElementById('searchHospitalSection');
  
    if (!searchHospitalBtn.contains(event.target) && !searchHospitalSection.contains(event.target)) {
      searchHospitalSection.classList.remove('visible');
    }
  }
  
  // Attach event listeners
  document.getElementById('search-hospital-btn').addEventListener('click', toggleSearchDropdown);
  document.addEventListener('click', closeSearchDropdown);
  