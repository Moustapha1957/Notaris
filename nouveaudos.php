<?php
session_start();
if (isset($_SESSION['email_user'])) {
    include 'nav.php';


?>

    <section class="contact-section mt-5 section-padding" id="section_5">
        <!-- <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Add Students</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="students.html">Student</a></li>
                            <li class="breadcrumb-item active">Add Students</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                        <form action="insert_cleint.php" method="post" class="custom-form contact-form" role="form">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">Enregistrement des client<span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nom Client<span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="nom_client" id="forme" placeholder="Saisissez le nom" required="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Prénom Client: <span class="login-danger">*</span></label>
                                        <input type="text" placeholder="Saisissez Prénom Client" name="prenom_client" id="capital" class="form-control" required="">
                                    </div>
                                </div>
                                <!-- <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Genre <span class="login-danger">*</span></label>
                                        <select class="form-control select">
                                            <option>choisir le genre</option>
                                            <option>Feminine</option>
                                            <option>Masculin</option>
                                            <option>Others</option>
                                        </select>
                                    </div>
                                </div> -->
                                <!-- <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Date Of Birth <span class="login-danger">*</span></label>
                                        <input class="form-control datetimepicker" type="text" placeholder="DD-MM-YYYY">
                                    </div>
                                </div> -->
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Adresse Client:</label>
                                        <input class="form-control" type="text" name="adresse_client" id="siege" placeholder="Adresse" required="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Contact Client:</label>
                                        <input type="text" name="contact_client" id="administration" class="form-control" placeholder="contact" required="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Prénom du Père:</label>
                                        <input type="text" name="prenom_pere_client" id="prenom_pere_client" class="form-control" placeholder="Prénom du Père" required="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nom du Père:</label>
                                        <input type="text" name="nom_pere_client" id="nom_pere_client" class="form-control" placeholder="Nom du Père" required="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Prénom de la Mère:</label>
                                        <input type="text" name="prenom_mere_client" id="prenom_mere_client" class="form-control" placeholder="Prénom de la Mère" required="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nom de la Mère:</label>
                                        <input type="text" name="nom_mere_client" id="nom_mere_client" class="form-control" placeholder="Nom de la Mère" required="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Situation Matrimonial :</label>
                                        <input type="text" name="situation_matrimoniale" id="denomination" class="form-control" placeholder="Situation Matrimonial">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Email Client : <span class="login-danger">*</span></label>
                                        <input type="email" name="email_client" id="denomination" class="form-control" placeholder="email">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-8">
                                    <div class="form-group local-forms">
                                        <label>Autres Informations: <span class="login-danger">*</span></label>
                                        <textarea name="autres_informations" id="autres_informations" class="form-control" required="">Autres Informations</textarea>
                                    </div>
                                </div>


                                <!-- <div class="col-12 col-sm-4">
                                    <div class="form-group students-up-files">
                                        <label>Upload Student Photo (150px X 150px)</label>
                                        <div class="uplod">
                                            <label class="file-upload image-upbtn mb-0">
                                                Choose File <input type="file">
                                            </label>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-12">
                                    <div class="student-submit">
                                        <button type="submit" class="btn btn-primary btn-lg">Soumettre</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
<?php
} else {
?>
    <center>
        <div style="margin-top: 300px">
            <h3>
                <?php
                // Redirigez avec un message de succès
                echo "<script>alert('Oups👋!!! Veuillez Vous Connectez.')</script>";
                echo "<script type='text/javascript'> document.location ='index.php'; </script>";
                ?>
            </h3>
        </div>
    </center>
<?php
}
?>