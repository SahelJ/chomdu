<?php
function wpdocs_codex_contact_init()
{
    add_menu_page(
        __('Contact', 'chomdu'),
        'Contact',
        'manage_options',
        'contactpageadmin',
        'contact_menu_page',
        'dashicons-email-alt2',
        4
    );
}



add_action('admin_menu', 'wpdocs_codex_contact_init');

function listingContact($urlBase)
{
    global $wpdb;
    $contact = $wpdb->get_results("SELECT * FROM wpcd_contacts ORDER BY created_at DESC", OBJECT);
    echo '<table ID="customers">
    <thead>
    <tr>
    <th>ID</th>
    <th>sujet</th>
    <th>email</th>
    <th>message</th>
    <th>date</th>
    <th>action</th>
    </tr>
    </thead>
    <tbody>';
    foreach ($contact as $contacts) {
        $contacts = json_decode(json_encode($contacts), true);
        $contacts[] = $contacts;
        // debug($contacts); 
        echo '<tr>
       <td>' . $contacts['ID'] . '</td>
       <td>' . $contacts['sujet'] . '</td>
       <td>' . $contacts['email'] . '</td>
       <td>' . $contacts['message'] . '</td>
       <td>' . $contacts['created_at'] . '</td>
       <td><a href="' . $urlBase . '&single=' . $contacts['ID'] . '">contact</a></td></tr>';
    }
    echo '</tbody></table>';
}
function singleContact($urlBase, $ID)
{
    global $wpdb;
    $contacts = $wpdb->get_row("SELECT * FROM wpcd_contacts WHERE ID=$ID", OBJECT);
    echo '<table ID="customers">
    <thead>
    <tr>
    <th>ID</th>
    <th>sujet</th>
    <th>email</th>
    <th>message</th>
    <th>date</th>
    </tr>
    </thead>
    <tbody>
    <tr>
       <td>' . $contacts->ID . '</td>
       <td>' . $contacts->sujet . '</td>
       <td>' . $contacts->email . '</td>
       <td>' . $contacts->message . '</td>
       <td>' . $contacts->created_at . '</td>
    </tr>
    </tbody>
    </table>';
    
}

function contact_menu_page()
{
    $urlBase = admin_url() . 'admin.php?page=contactpageadmin';
    if (!empty($_GET['single']) && is_numeric($_GET['single'])) {
        $ID = $_GET['single'];
        singleContact($urlBase, $ID);
    } else {
        listingContact($urlBase);
    }
}
    
?>

<style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        wIDth: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solID #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #3858E9;
        color: white;
    }
</style>