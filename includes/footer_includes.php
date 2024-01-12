

  <!-- JAVASCRIPTS -->
  <!-- jQuey -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
  <!-- Shuffle -->
  <script src="assets/plugins/shuffle/shuffle.min.js"></script>
  <!-- Magnific Popup -->
  <script src="assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
  <!-- Slick Carousel -->
  <script src="assets/plugins/slick/slick.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <!-- SyoTimer -->
  <script src="assets/plugins/syotimer/jquery.syotimer.min.js"></script>

  <!-- Custom Script -->
  <script src="assets/js/script.js"></script>
  <!-- Hide for local -->
  <!-- Google tag (gtag.js) -->  
 <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-LETMFXLNT7"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-LETMFXLNT7'); </script> -->
  <!-- <script>
    
    var studentRegisterTables = document.getElementsByClassName("studentRegisterTable");

for (var i = 0; i < studentRegisterTables.length; i++) {
  studentRegisterTable[i].innerHTML = days;
}
  </script> -->
  <script>
  document.addEventListener('DOMContentLoaded', function () {
    // Get the current page URL
    var currentPath = window.location.pathname;

    // Function to extract filename from a given path
    function getFileName(path) {
      return path.split('/').pop();
    }

    // Function to remove "./" from the beginning of a path
    function removeDotSlash(path) {
      return path.replace(/^\.\//, '');
    }

    // Select all nav-item elements within the navbar
    var navItems = document.querySelectorAll('.navbar-nav .nav-item');

    // Loop through each nav-item
    navItems.forEach(function (item) {
      // Remove "active" class from all nav-items initially
      item.classList.remove('active');

      // Select the anchor tag within the current nav-item
      var link = item.querySelector('a.nav-link');

      // Check if the filename of the href attribute matches the filename of the current page URL
      if (getFileName(removeDotSlash(link.getAttribute('href'))) === getFileName(currentPath)) {
        // Add the "active" class to the current nav-item
        item.classList.add('active');
      }

      // Check if there is a dropdown menu within the current nav-item
      var dropdownMenu = item.querySelector('.dropdown-menu');

      if (dropdownMenu) {
        // Select all dropdown-item elements within the dropdown menu
        var dropdownItems = dropdownMenu.querySelectorAll('.dropdown-item');

        // Loop through each dropdown-item
        dropdownItems.forEach(function (dropdownItem) {
          // Check if the filename of the dropdown-item matches the filename of the current page URL
          if (getFileName(removeDotSlash(dropdownItem.getAttribute('href'))) === getFileName(currentPath)) {
            // Add the "active" class to the current nav-item
            item.classList.add('active');
          }
        });
      }
    });
  });
</script>