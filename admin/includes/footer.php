<!-- Footer -->
<footer class="sticky-footer bg-white mt-5">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright Desa Tamaona. &copy; All Rights Reserved</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
      </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
      function active_disactive(val, id){
        $.ajax({
          type:'post',
          url: 'toggle.php',
          data:{val:val,id:id},
          success :function(result){
            if(result == '1'){
              $('#str'+id).html('Active');
            } else{
              $('#str'+id).html('Disactive');
            }
          }
        });
      }
    </script>
    


    <!-- <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js "></script>
    <script>
      function toggleStatus('toggle_id'){
        var toggle_id= toggle_id;
        $.ajax({
          url: "toggle.php",
          type:"post",
          data:{id:toggle_id},
          success :function(result){
            if(result == '1'){
              swal("Done!","Pengaduan ditampilkan","success");
            } else{
              swal("Done!","Pengaduan tidak ditampilkan","success");

            }
          }
        });
      }
    </script> -->

    
</body>
