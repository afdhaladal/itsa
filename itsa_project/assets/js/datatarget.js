document.addEventListener('DOMContentLoaded', function () {
    // Ambil semua tombol dengan class "btn-show-section"
    const btnsShowSection = document.querySelectorAll('.btn-show-section');
  
    // Tambahkan event listener pada setiap tombol
    btnsShowSection.forEach(function (btn) {
      btn.addEventListener('click', function () {
        // Ambil nilai dari atribut data-target
        const targetSectionId = btn.getAttribute('data-target');
  
        // Sembunyikan semua section
        hideAllSections();
  
        // Tampilkan section yang sesuai dengan tombol yang ditekan
        showSection(targetSectionId);
      });
    });
  
    // Fungsi untuk menyembunyikan semua section
    function hideAllSections() {
      const allSections = document.querySelectorAll('.portfolio-details');
      allSections.forEach(function (section) {
        section.style.display = 'none';
      });
    }
  
    // Fungsi untuk menampilkan section tertentu
    function showSection(sectionId) {
      const targetSection = document.getElementById(`portfolio-details-${sectionId}`);
      if (targetSection) {
        targetSection.style.display = 'block';
      }
    }
  });
  