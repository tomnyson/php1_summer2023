document.addEventListener('DOMContentLoaded', function() {
            // Your JavaScript code here
            // console.log('DOM content loaded!');
            // // You can interact with the DOM safely here
            // // For example, you can access elements and add event listeners
            // const myButton = document.getElementById('editCat');
            // myButton.addEventListener('click', function() {
            //     console.log('Button clicked!');
            // });
        })

$('#editCategoryModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var categoryId = button.data('category-id'); // Extract data from data-* attributes
            var categoryName = button.data('category-name');

            // Update the form field values
            $('#categoryId').val(categoryId);
            $('#categoryName').val(categoryName);
        });

  function submitForm() {
            // Submit the form inside the modal
            document.querySelector('#editCategoryModal form').submit();

            // Close the modal after submission (optional)
            $('#editCategoryModal').modal('hide');
        }