<?php
  if(isset($_SESSION["username"])){
?>
  <script type="text/javascript">
    let showContentToClients = document.querySelectorAll(".showContentToClients");
    showContentToClients.forEach(element=>{
        element.style.display = "block";
    })

    let hideContentToClients = document.querySelectorAll(".hideContentToClients");
    hideContentToClients.forEach(element=>{
        element.remove();
    })
  </script>
  <?php
  }
  ?>

</body>

</html>