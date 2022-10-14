<?php include ("header.php") ?>


  <!-- Body-->
  <meta name="viewport" content="width=device-width">
    
    <link href="css/style.css" rel="stylesheet" type="text/css" />
  </head>
  <body> 
    
    <div id="resultado"></div>

    <div id="camera" ></div>

    <script src="js/quagga.min.js"> 
    </script>
    
  </style>


  <!--     <script>

        Quagga.init({
            inputStream: 
            {
              name: "Live",
              type: "LiveStream",
              target: document.querySelector('#camera'),
              constraints: {
                height: 380,
                width: 180,
                        
                      }
                          
            },
            decoder: {
                readers: ["code_128_reader"] 
                        
            }
        }, function (err) {
            if (err) {
                console.log(err);
                return
            }
            console.log("Initialization finished. Ready to start");
            Quagga.start();
        });

        Quagga.onDetected(function (data) {
            console.log(data.codeResult.code);
            document.querySelector('#resultado').innerText = data.codeResult.code;
        });
        
    </script> 
  -->
    
  <form action="produ.php" method="post">
    <div class="mb-3">
      <label for="" class="form-label">Codigo SAP</label>
      <input type="text" name="Codigo_scan" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>
    <?php
    if(isset($_POST['submit'])){
      echo $_POST['Codigo_scan'];
    }
    ?>
    
  </body>



  <?php include ("footer.php") ?>