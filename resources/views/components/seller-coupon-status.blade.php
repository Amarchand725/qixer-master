<span class="dash-icon color-1 dash-edit-icon swal_status_button"> <i class="las la-edit"></i> </span>
<form method='post' action='{{$url}}' class="d-none">
<input type='hidden' name='_token' value='{{csrf_token()}}'>
<br>
<button type="submit" class="swal_form_submit_btn d-none"></button>
 </form>