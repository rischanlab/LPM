var readUrl   = 'dosen/read',
    updateUrl = 'dosen/update',
    delUrl    = 'dosen/delete',
    delHref,
    updateHref,
    updateId;
	var dialogWidth = 430;


$( function() {
    
    $( '#tabs' ).tabs({
        fx: { height: 'toggle', opacity: 'toggle' }
    });
    
    readUsers();
    
    $( '#msgDialog' ).dialog({
        autoOpen: false,
        resizable: false,
		hide: "explode",
        buttons: {
            'Ok': function() {
                $( this ).dialog( 'close' );
            }
        }
    });
    
    $( '#updateDialog' ).dialog({
        autoOpen: false,
		hide: "explode",
		position: [($(window).width() / 2) - (dialogWidth / 2), 150],
		resizable: false,
        buttons: {
            'Update': function() {
                $( '#ajaxLoadAni' ).fadeIn( 'slow' );
                $( this ).dialog( 'close' );
                
                $.ajax({
                    url: updateHref,
                    type: 'POST',
                    data: $( '#updateDialog form' ).serialize(),
                    
                    success: function( response ) {
                        
                        $( '#msgDialog > p' ).html( response );
                        $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                        
                        $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                        
                        //--- update row in table with new values ---
                        var nim = $( 'tr#' + updateId + ' td' )[ 0 ];
                        var nama = $( 'tr#' + updateId + ' td' )[ 1 ];
			var fak = $( 'tr#' + updateId + ' td' )[ 2 ];
                        var hp = $( 'tr#' + updateId + ' td' )[ 3 ];
			 var nilai = $( 'tr#' + updateId + ' td' )[ 4 ];
                      
                        
                        $( nim ).html( $( '#nim' ).val() );
                        $( nama ).html( $( '#nama' ).val() );
			$( fak ).html( $( '#fak' ).val() );
                        $( hp ).html( $( '#hp' ).val() );
			$( nilai ).html( $( '#nilai' ).val() );
                        
                        
                        //--- clear form ---
                        $( '#updateDialog form input' ).val( '' );
                        
                    } //end success
                    
                }); //end ajax()
            },
            
            'Cancel': function() {
                $( this ).dialog( 'close' );
            }
        },
        width: '350px'
    }); //end update dialog
    
    $( '#delConfDialog' ).dialog({
        autoOpen: false,
        
        buttons: {
            'No': function() {
                $( this ).dialog( 'close' );
            },
            
            'Yes': function() {
                //display ajax loader animation here...
                $( '#ajaxLoadAni' ).fadeIn( 'slow' );
                
                $( this ).dialog( 'close' );
                
                $.ajax({
                    url: delHref,
                    
                    success: function( response ) {
                        //hide ajax loader animation here...
                        $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                        
                        $( '#msgDialog > p' ).html( response );
                        $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                        
                        $( 'a[href=' + delHref + ']' ).parents( 'tr' )
                        .fadeOut( 'slow', function() {
                            $( this ).remove();
                        });
                        
                    } //end success
                });
                
            } //end Yes
            
        } //end buttons
        
    }); //end dialog
    
    $( '#records' ).delegate( 'a.updateBtn', 'click', function() {
        updateHref = $( this ).attr( 'href' );
        updateId = $( this ).parents( 'tr' ).attr( "id" );
        
        $( '#ajaxLoadAni' ).fadeIn( 'slow' );
        
        $.ajax({
            url: 'dosen/getById/' + updateId,
            dataType: 'json',
            
            success: function( response ) {
		$( '#nim' ).val( response.NIM );
                $( '#nama' ).val( response.NAMA );
		$( '#fak' ).val( response.FAK );
                $( '#hp' ).val( response.HP_MHS );
                $( '#nilai' ).val( response.NILAI );
                
                $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                
                //--- assign id to hidden field ---
                $( '#userId' ).val( updateId );
                
                $( '#updateDialog' ).dialog( 'open' );
            }
        });
        
        return false;
    }); //end update delegate
    
    $( '#records' ).delegate( 'a.deleteBtn', 'click', function() {
        delHref = $( this ).attr( 'href' );
        
        $( '#delConfDialog' ).dialog( 'open' );
        
        return false;
    
    }); //end delete delegate
    
    
    // --- Create Record with Validation ---
    $( '#create form' ).validate({
        rules: {
            cName: { required: true },
            cEmail: { required: true, email: true }
        },
        
        /*
        //uncomment this block of code if you want to display custom messages
        messages: {
            cName: { required: "Name is required." },
            cEmail: {
                required: "Email is required.",
                email: "Please enter valid email address."
            }
        },
        */
        
        submitHandler: function( form ) {
            $( '#ajaxLoadAni' ).fadeIn( 'slow' );
            
            $.ajax({
                url: 'index.php/dosen/create',
                type: 'POST',
                data: $( form ).serialize(),
                
                success: function( response ) {
                    $( '#msgDialog > p' ).html( 'New user created successfully!' );
                    $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                    
                    //clear all input fields in create form
                    $( 'input', this ).val( '' );
                    
                    //refresh list of users by reading it
                    //readUsers();
                    dataTable.fnAddData([
                        response,
                        $( '#cName' ).val(),
                        $( '#cEmail' ).val(),
'<div style="text-align:center;"><a class="updateBtn" href="' + updateUrl + '/' + response + '"><img src="http://localhost/Part-6/images/edit.png" width="19" height="19"></a> | <a class="deleteBtn" href="' + delUrl + '/' + response + '"><img src="http://localhost/Part-6/images/delete.png" width="19" height="19"></a></div>'
                    ]);
                    
                    //open Read tab
                    $( '#tabs' ).tabs( 'select', 0 );
                    
                    $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                }
            });
            
            return false;
        }
    });
    
}); //end document ready


function readUsers() {
    //display ajax loader animation
    $( '#ajaxLoadAni' ).fadeIn( 'slow' );
    
    $.ajax({
        url: readUrl,
        dataType: 'json',
        success: function( response ) {
            
            for( var i in response ) {
                response[ i ].updateLink = updateUrl + '/' + response[ i ].ID;
               // response[ i ].deleteLink = delUrl + '/' + response[ i ].id;
            }
            
            //clear old rows
            $( '#records > tbody' ).html( '' );
            
            //append new rows
            $( '#readTemplate' ).render( response ).appendTo( "#records > tbody" );
            
            //apply dataTable to #records table and save its object in dataTable variable
            if( typeof dataTable == 'undefined' )
                dataTable = $( '#records' ).dataTable({"bJQueryUI": true});
            
            //hide ajax loader animation here...
            $( '#ajaxLoadAni' ).fadeOut( 'slow' );
        }
    });
} // end readUsers