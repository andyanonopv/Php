$( document ).ready(function() {
    const createBlog = $('#createBlog');
    const displayModal = $('.create-blog');
    

    console.log(displayModal);

    function createOrShowModal() {
        let modal = $('.modal');
        if (modal.length === 0) {
            
            modal = $('<div/>', {
                class: 'modal',
                css: {
                    display: 'flex' 
                }
            });

            const titleInput = $('<input/>', {
                type: 'text',
                name: 'title',
                class: 'input-group',
                placeholder: 'Enter a title for the post',
                id: 'title'
            });
            const contentInput = $('<input/>', {
                type: 'text',
                name: 'content',
                class: 'input-group',
                placeholder: 'Write the content',
                id: 'content'
            });
            const saveButton = $('<button/>', {
                text: 'Save',
                class: 'btn btn-primary',
                click: function() {
                    modal.hide(); 
                }
            });
            const closeButton = $('<button/>', {
                text: 'Close',
                class: 'btn btn-danger',
                click: function() {
                    modal.hide(); 
                }
            });

            const createForm = $('<form/>', {
                id: 'postForm',
                submit: function(event) {
                    event.preventDefault(); // Prevent the form from submitting traditionally
            
                    // Get the form data
                    const title = $('#title').val();
                    const content = $('#content').val();
            
                    // Send the data to the server for processing
                    $.ajax({
                        type: 'POST',
                        url: 'create_posts.php', // Replace with your server-side script URL
                        data: {
                            title: title,
                            content: content
                        },
                        success: function(response) {
                            // Handle the response from the server (e.g., show a success message)
                            alert(response);
                            modal.hide();
                        }
                    });
                }
            });

            modal.css("display","flex");
            createForm.append(titleInput, contentInput, saveButton, closeButton);
            modal.append(createForm);
            
            
            displayModal.append(modal);
        } else {
            modal.show(); 
        }
    }
    
    $(createBlog).on("click",function() {
        createOrShowModal();
    })
});

