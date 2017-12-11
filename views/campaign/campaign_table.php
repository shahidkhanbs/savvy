
 <table class="table table-striped table-bordered table-hover table-checkable" id="sample_1">
    <thead>
        <tr>
            <th>S.NO</th>
            <th>Campaign Name</th>
            <th>Academic Year</th>
            <th>Campaign Start Date</th>
            <th>Campaign End Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php if($campaigns)                                           
    foreach ($campaigns as $campaign) {                                              
    ?>             
        <tr>
            <td><?=  $campaign['CAMPAIGN_ID'] ?></td>
            <td><?=  $campaign['CAMPAIGN_NAME'] ?></td>
            <td><?=  $campaign['AY_FROM'] .' To '.$campaign['AY_TO'] ?></td>
            <td><?=  $campaign['CAMPAIGN_START_DATE'] ?></td>
            <td><?=  $campaign['CAMPAIGN_END_DATE'] ?></td>
            <td>
               <?php if($campaign['ACTIVE_FLAG']==1) {?>
             <a href="javascript:;" title="Delete Campaign" id="<?=  $campaign['CAMPAIGN_ID'] ?>" onclick="deleteCampaign(this.id,0);" class="btn btn-icon-only red">
                <i class="fa fa-trash"></i>
             </a>
                <?php } if($campaign['ACTIVE_FLAG']==0) { ?>
             <a href="javascript:;" title="Active Campaign" id="<?=  $campaign['CAMPAIGN_ID'] ?>" onclick="activeCampaign(this.id,1);" class="btn btn-icon-only green">
                <i class="fa fa-check"></i>
             </a>   
                <?php }  ?>
            <a href="javascript:;" title="Edit Campaign" id="<?=  $campaign['CAMPAIGN_ID'] ?>" onclick="editCampaign(this.id);" class="btn btn-icon-only blue">
                <i class="fa fa-edit"></i>
            </a>  
            </td>
        </tr>        
    <?php } ?>       
    </tbody>
</table>
<script type="text/javascript">
   jQuery(document).ready(function() {
        TableDatatablesManaged.init();
    });
</script>