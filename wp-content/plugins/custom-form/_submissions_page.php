<h1>Submissions</h1>
<?php if($message) echo '<div class="updated notice notice-success is-dismissible"><p>'.$message.'</p></div>'?>
<table class="wp-list-table widefat fixed striped submissions">
    <thead>
        <tr>
            <th>
                
            </th>
            <th>
                ID
            </th>
            <th>
                first name
            </th>
            <th>
                last name
            </th>
            <th>
                date
            </th>    
        </tr>
    </thead>
    <tbody>
        <?php foreach($submissions as $submission):?>
        <tr>
            <td><button class="btn btn-primary more-info" name="<?php echo $submission->id ?>">more info +</button></td>
            <td><?php echo $submission->id ?></td>
            <td><?php echo $submission->first_name ?></td>
            <td><?php echo $submission->last_name ?></td>
            <td><?php echo $submission->date ?></td>
            
        </tr>
        <tr class="hidden">
            <td colspan="5">
                <table class="wp-list-table widefat fixed striped submissions">
                    <tr>
                        <th>
                            email
                        </th>
                        <th>
                            message
                        </th>
                    </tr>
                    <tr>
                        <td><?php echo $submission->email ?></td>
                        <td><?php echo $submission->message ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>