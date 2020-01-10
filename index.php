<?php require_once('conn.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <title>VoteCounter | Interactive Counter for the 2019 Presidential Election</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/jquery-ui.min.css" rel="stylesheet">  
      <link href="css/dataTables.bootstrap4.css" rel="stylesheet">   
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-135205867-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-135205867-1');
        </script>
  </head>

<body style="padding-top: 5rem;">
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">VoteCounter</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>      
    </div>
    <a class="btn btn-primary my-2 my-sm-0" href="/">Reload this Page</a>
  </nav>

  <main role="main" class="container">            
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-4">
              <div class="card" style="width: 14.5rem;">
                <img src="img/apc-logo.jpg" class="card-img-top" alt="APC Logo">
                <div class="card-body">
                  <h5 class="card-title text-center">
                    <?php                  
                          $sql = $pdo->prepare("SELECT sum(apc) as 'Total APC' from votes");                
                          // execute the prepared statement
                          $sql->execute();
                          while ($apc = $sql->fetch()) {
                          if ($apc > 0){
                          $total_apc = number_format($apc['Total APC']);

                          echo $total_apc;
                          ?>      
                               
                          <?php 
                          } else {
                              echo "<p>No matches found</p>";
                          }
                      }                  
                  ?>                    
                  </h5>
                </div>
              </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4">
              <div class="card" style="width: 17.1rem;">
                <img src="img/pdp-logo-2.jpg" class="card-img-top" alt="PDP Logo">
                <div class="card-body">
                  <h5 class="card-title text-center">
                   <?php                  
                          $sql = $pdo->prepare("SELECT sum(pdp) as 'Total PDP' from votes");                
                          // execute the prepared statement
                          $sql->execute();
                          while ($pdp = $sql->fetch()) {
                          if ($pdp > 0){
                          $total_pdp = number_format($pdp['Total PDP']);

                          echo $total_pdp;
                          ?>      
                               
                          <?php 
                          } else {
                              echo "<p>No matches found</p>";
                          }
                      }                  
                  ?>              
                  </h5>
                </div>
              </div>
            </div>              
          </div>
          
        </div>  

      </div>   

      <div class="row">
        <div class="col-md-12">
          <div class="card mt-3">
        <div class="card-header">
          <i class="fa fa-list"></i> <b>States</b>          
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>State</th>
                  <th>APC</th>                  
                  <th>PDP</th>
                  <th>Winner</th>
                  <th>Difference</th>
                </tr>
              </thead>
              <tfoot class="small text-muted">
                <tr>
                  <th></th>
                  <th></th>
                  <th><?php echo $total_apc; ?></th>                  
                  <th><?php echo $total_pdp; ?></th>
                  <th></th>
                  <th class="<?php  echo (intval(str_replace(',','',$total_apc)) - intval(str_replace(',','',$total_pdp))) ? 'table-success' : 'table-danger'; ?>">
                    <?php 
                        if(intval(str_replace(',','',$total_apc)) - intval(str_replace(',','',$total_pdp))){
                            echo number_format(intval(str_replace(',','',$total_apc)) - intval(str_replace(',','',$total_pdp))) ;
                        }else {
                            echo number_format(intval(str_replace(',','',$total_pdp)) - intval(str_replace(',','',$total_apc))) ;
                        } 
                        #echo $total_apc - $total_pdp;
                    ?>
                  </th>                   
                </tr>
              </tfoot>
              <tbody>
              <?php
                $sql = $pdo->prepare("SELECT state, apc, pdp from votes");
                    $sql->execute();
                    $counter = 0; 

                   while ($report = $sql->fetch()) {
                         $state = $report['state'];
                         $apc = $report['apc'];
                         $pdp = $report['pdp'];               
              ?>
              <?php
                      if($apc > $pdp){
                        $twinner = 'APC';
                        $tclass='table-success';
                      } elseif ($pdp > $apc) {
                        $twinner = 'PDP';
                        $tclass='table-danger';
                      }
                    ?>  
                <tr class="<?php echo $tclass; ?>">
                  <td><?php echo ++$counter; ?></td>
                  <td><?php echo $state; ?></td>
                  <td><?php echo number_format($apc); ?></td>
                  <td><?php echo number_format($pdp); ?></td>  
                  <td><?php echo $twinner; ?></td>
                  <td><?php echo ($pdp > $apc ) ? number_format($pdp - $apc) : number_format($apc - $pdp) ; ?></td>
                  
                </tr>
                <?php }?>               
              </tbody>
            </table>
          </div>
        </div>
       
      </div>
      <div class="mt-4">Developed by <a href=http://delitech.com.ng/about.php>DeliTech Solutions</a></div>
        </div>
      </div>
  </main>     

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.dataTables.js"></script>
    <script src="js/dataTables.bootstrap4.js"></script> 
    <script type="text/javascript">          
      $(document).ready( function () {
        $('#dataTable').DataTable(
            {
                "lengthMenu": [ 50, 75, 100 ]
            });
      } );
    </script>  
</body>
</html>