

 <?php
 $page="xabarlar";
 $link="../";
 include("../layouts/header.php");
 


  $sql="SELECT * FROM contact ORDER BY id DESC ";
  $stmt=$conn->prepare($sql);
  $stmt->execute();
  $messages=$stmt->fetchAll();


 ?>

      <main class="main-content">
       

        <section class="card-box">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h5 mb-0">Mavjud loyihalar</h2>
            <input type="search" class="form-control form-control-sm table-search" placeholder="Qidirish...">
          </div>
          <div class="table-responsive">
            <table class="table table-dark table-hover align-middle mb-0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Ism</th>
                  <th>Email</th>
                   <th>Mavzu</th>
                  <th>holati</th>
                  <th>vaqti</th>
                  <th>Amal</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $i=0;
                foreach($messages as $message) :
                  $i++;
                   ?>
                <tr>
                  <td><?= $i ?></td>
                  <td><?= $message["name"] ?></td>
                  <td><?= $message["email"] ?></td>
                   <td><?= $message["subject"] ?></td>
                  <td><?php
                  $view=$message["view"];
                  if($view==0){
                     echo '<span class="badge text-bg-warning">no views</span>';
                  }else{
                    echo '<span class="badge text-bg-info">views</span>';
                  }
                  
                  ?></td>
                  <td><?php 
                   $sana=strtotime($message["create_at"]);
                    echo date('y-m-d H:i',$sana);
                  ?></td>
                  <td>
                    <div style="display: flex;">
                     <a href="show.php?m_id=<?=$message['id'] ?>" class="btn btn-sm btn-outline-info">view</a>
                     <form action="delete.php" method="POST">
                      <input type="hidden" name="m_id" value="<?=$message["id"]?>" >
                       <button type="submit" class="btn btn-sm btn-outline-danger">delete</button>
                     </form>
                      
                    </div>
                  </td>
                </tr>
                <?php endforeach ?>
                
              </tbody>
            </table>
          </div>
        </section>
      </main>
    </div>
  </div>
</body>
</html>
