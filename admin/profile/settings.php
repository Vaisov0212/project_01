


 <?php
 $page="sozlamalar";
 $link="../";
 include("../layouts/header.php");
 
 $u_id=$_SESSION["user_id"];


  $sql="SELECT * FROM users WHERE id=:id";
  $stmt=$conn->prepare($sql);
  $stmt->execute([
    ':id'=>$u_id
  ]);
  $admin=$stmt->fetch();


 ?>

      <main class="main-content">
       

        <section class="card-box">
         <div class="page-wrap">
            <div class="panel">
            <div class="title-row">
                <h1 class="h4 mb-0">Yangi contact xabari</h1>
            </div>
         
               <div class="d-flex" >
                  
                        <div class="col-lg-6" > 
                            <div><?php if( !empty($_SESSION["settings_err"])) : ?>
                                <h4 class="h4 mb-0 text-danger"><?= $_SESSION["settings_err"] ?></h4>
                                <?php 
                                unset($_SESSION["settings_err"]);
                                 endif?>
                            </div>
                            <div><?php if( !empty( $_SESSION["admin_messgae"])) : ?>
                                <h4 class="h4 mb-0 text-success"><?=  $_SESSION["admin_messgae"]?></h4>
                                <?php 
                                unset( $_SESSION["admin_messgae"]);
                                 endif?>
                            </div>
                    <div class="col-md-12">
                          <form action="settings_update.php" method="POST" >
                              <label class="form-label">Ism</label>
                                <input name="name" value="<?= $admin["name"] ?>" type="text" class="form-control" placeholder="F.I.Sh">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Email</label>
                            <input name="email" value="<?= $admin["email"] ?>"  type="email" class="form-control" placeholder="example@mail.com">
                        </div>
                         <div class="col-12 d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Saqlash</button>           
                          </div>
                          </form>
                    </div>
                    <div class="col-lg-6" > 
                         <div class="col-md-12">
                            <div><?php if( !empty($_SESSION["pass_err"])) : ?>
                                <h4 class="h4 mb-0 text-danger"><?= $_SESSION["pass_err"] ?></h4>
                                <?php 
                                unset($_SESSION["pass_err"]);
                                 endif?>
                            </div>
                            <div><?php if( !empty( $_SESSION["pass_messgae"])) : ?>
                                <h4 class="h4 mb-0 text-success"><?=  $_SESSION["pass_messgae"]?></h4>
                                <?php 
                                unset( $_SESSION["pass_messgae"]);
                                 endif?>
                            </div>
                            <form action="password_update.php" method="POST" >
                                <label class="form-label">oldingi parol</label>
                            <input name="old_pass" type="password" class="form-control" placeholder="***********">
                            </div>
                            <div class="col-md-12">
                            <label class="form-label">yangi parol</label>
                            <input name="new_pass" type="password" class="form-control" placeholder="***********">
                            </div>
                               <div class="col-md-12">
                            <label class="form-label">parolni tasdiqlash</label>
                            <input name="confirm_pass" type="password" class="form-control" placeholder="***********">
                            </div>
                            <div class="col-12 d-flex gap-2">
                                 <button type="submit" class="btn btn-primary">Saqlash</button>
                            </div>
                            </form>
                    </div>
               </div>
              
               
       
            </div>
        </div>
        </section>
      </main>
    </div>
  </div>
</body>
</html>
