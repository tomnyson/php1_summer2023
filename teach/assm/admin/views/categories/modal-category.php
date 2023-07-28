 <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="./index.php?route=categoryController&action=save" method="POST">
                     <!-- Hidden ID Field -->
                     <input type="hidden" name="category_id" value="123">

                     <div class="form-group">
                         <label for="category_name">Category Name</label>
                         <input type="hidden" class="form-control" name="id" id="categoryId"
                             placeholder=" Enter category name" value="Category Name">
                         <input type="text" class="form-control" name="name" id="categoryName"
                             placeholder=" Enter category name" value="Category Name">
                         <input type="hidden" class="form-control" name="action" value="update">
                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                 <button type="button" value="edit" name="action" class="btn btn-primary" onclick="submitForm()">Update
                     Category</button>
             </div>
         </div>
     </div>
 </div>