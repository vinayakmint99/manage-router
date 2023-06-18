<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view('header'); ?>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Uploaded Details</h3>
            <div class="card-tools">
            </div>
        </div>
        <div class="card-body">

    <div class="alert alert-success" id="success-alert" style="display:none;">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Success! </strong> All Imports have been approved now.
    </div>

    <table class="table table-sm table-bordered w-auto small" width="100%" border='1' style='border-collapse: collapse;'>
        <thead>
          <tr>
            <th width='4%'>Sl.no</th>
            <th width='12%'>Sapid</th>
            <th width='12%'>Hostname</th>
            <th width='12%'>Loopback</th>
            <th width='12%'>Mac address</th>
            <th width='12%'>Creation Date</th>
            <th width='12%'>Status</th>
            <th width='12%'>Action</th>
          </tr>
        </thead>
        <?php 
        // User List
        $slno= 1;
        foreach($userlist as $user){
            $id = $user['id'];
            $sapid = $user['sapid'];
            $hostname = $user['hostname'];
            $loopback = $user['loopback'];
            $mac_address = $user['mac_address'];
            $creation_date = $user['creation_date'];
            $duplicateclass = ($user['status']=='2')?'duplicate':'';
            $find_error = ($user['status']=='2')?'1':'0';
            $route_status = ($user['status']=='1')?'Approved':'Pending';
            $row_id="rowid_".$id;
            $group_class="group_".$sapid;            

            echo "<tr class='".$duplicateclass." ".$group_class."'  id='".$row_id."'>";

            echo "<td>
                <span>".$slno."</span>
                
            </td>";

            echo "<td>
                <span class='edit' id='sapidspan_".$id."'>".$sapid."</span>
                <input type='text' class='txtedit' data-id='".$id."' data-field='sapid' id='sapidtxt_".$id."' value='".$sapid."' >
            </td>";
            echo "<td>
                <span class='edit' id='hostspan_".$id."' >".$hostname."</span>
                <input type='text' class='txtedit' data-id='".$id."' data-field='hostname' id='hostnametxt_".$id."' value='".$hostname."' >
            </td>";

            echo "<td>
                <span class='edit' id='loopbackspan_".$id."'>".$loopback."</span>
                <input type='text' class='txtedit' data-id='".$id."' data-field='loopback' id='loopbacktxt_".$id."' value='".$loopback."' >
            </td>";

            echo "<td>
                <span class='edit' id='macaddress_".$id."'>".$mac_address."</span>
                <input type='text' class='txtedit' data-id='".$id."' data-field='mac_address' id='mac_addresstxt_".$id."' value='".$mac_address."' >
            </td>";

            echo "<td>
            <span class='edit' id='creationdate_".$id."'>".$creation_date."</span>
            <input type='text' class='txtedit' data-id='".$id."' data-field='creation_date' id='creation_datetxt_".$id."' value='".$creation_date."' >
        </td>";

        echo "<td>
            <span>".$route_status."</span>
            
        </td>";
        
        echo "<td>
            <span><a href='javascript:void(0)' class='txtdel' data-id='".$id."' data-val='".$sapid."'><i class='material-icons'>delete</i></a></span>
            
        </td>";
            echo "</tr>";

            $slno++;
        }
        ?>

    </table>

    <div class="form-group" style="text-align: center;">

    <input type="hidden" name="find_error" id="find_error" value="<?php echo $find_error; ?>" />

      <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light" id="btnSubmit" <?php if($find_error) { ?>disabled <?php } ?>>Submit To Approve</button>
                </div>

    </div>
    </div>
</section>

    <?php $this->load->view('footer'); ?>

    







