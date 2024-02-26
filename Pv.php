<?php session_start();

include 'nav.php';
 ?>


<section class="contact-section section-padding" id="section_5">
        <div class="container">
            
                 <center> 
                <div class="col-lg-6 col-6">
                    <form action="insert_pv.php" method="post" class="custom-form contact-form" role="form">
                        <center> <h2 class="mb-4 pb-2">Elaboration de Pv</h2></center> 
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-floating">
                                      <label for="floatingInput">Date d'elaboration du Pv</label>
                                    <input type="date" name="date" id="full-name" class="form-control" placeholder="date" required="">
                                </div>
                            </div>

                            
                            <div class="col-lg-12 col-12">
                                <div class="form-floating">

                                    <label for="floatingTextarea">Libelle</label>
                                    <textarea class="form-control" id="message" name="message" placeholder="message"></textarea>
                                   
                                </div>
                                </div>
                                <button type="submit" class="form-control">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
                </center> 
        </body>