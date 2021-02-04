

<div class="modal fade" id="infoe" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Info</h5>
				</div>
				<div class="modal-body">
					<form  id="addform" Method="POST" action="admin/action/uinfo.php">
					
					
						
						<div class="row">
							<div class="col-12 col-sm-6">
								
							</div>
							<div class="col-12 col-sm-6">
								
							</div>
						</div>
                        <div class="form-group mb-0"><textarea name="info" class="form-control" placeholder="Info" rows="35">
                        <?php 
                        $result = $mng->getinfo();
                        echo $result['about_content'];
                        ?>        
                        </textarea></div>
					
				</div>
				<div class="modal-footer d-block">
					<div class="actions justify-content-between"><button type="button" class="btn btn-error" data-dismiss="modal">Cancel</button> <button type="submit" id="update" class="btn btn-info">Edit Info</button></div>
                    </form>
                </div>
			</div>
		</div>
	</div>





<script>
$(document).ready(function(){
  $("#p").click(function(){
    $('#infoe').modal('show'); 
  });



$("#update").click(function(e) {
    $("#addform").on('submit', function (event) {
        event.preventDefault(); //prevent default action 
        var post_url = $(this).attr("action"); //get form action url
        var form_data = $(this).serialize(); //Encode form elements for submission

        $.post(post_url, form_data, function (response) {

            if (response == '1') {
                location.reload();

            } else {

                console.log("there is an error");
            }
        });
    });

                        });
                    });

</script>






















