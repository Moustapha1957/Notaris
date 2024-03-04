    <section class="">
      <div >
        <div class="">
          <div class="col-md-6 text-center d-flex align-items-center">
            <div class="wrap">
              <h2 class="mb-2"></h2>
              <button type="button" class="btn btn-primary py-3 px-4" data-toggle="modal" data-target="#exampleModalCenter">
                Envoyer un Nouveau Message
                
              </button>

              <!-- Modal -->
            </div>
          </div>
        </div>
      </div>
    </section>
     
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header img" style="background-image: url(images/bg-1.jpg);">
            <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="ion-ios-close"></span>
            </button>
          </div>
          <div class="modal-body pt-md-0 pb-5 px-4 px-md-5 text-center">
            <h2>Nouveau message</h2>
            <div class="icon d-flex align-items-center justify-content-center">
              <img src="images/email.svg" alt="" class="img-fluid">
            </div>
            <h4 class="mb-2"></h4>
            <form action="reserve.php" class="subscribe-form" method="POST">
              <div class="form-group ">
                <label for="exampleFormControlTextarea1">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email_recepteur" required="">
              </div><br>
              <div class="form-group ">
                <label for="exampleFormControlTextarea1">Objet</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Objet" name="sujet">
              </div><br>
              <div class="form-group ">
                <label for="exampleFormControlTextarea1">Message</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="libelle_messagerie" required=""></textarea>
              </div>
              </div>
                <input type="submit" value="Envoyer" class="form-control submit px-3 rounded-right" name="Envoyer">
              </div>
            </form>
            
          
      </div>
    </div>

    <script src="New/modal-10/js/jquery.min.js"></script>
    <script src="New/modal-10/js/popper.js"></script>
    <script src="New/modal-10/js/bootstrap.min.js"></script>
    <script src="New/modal-10/js/main.js"></script>
  


</body>
<script type="text/javascript">
  
  $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
</html>
