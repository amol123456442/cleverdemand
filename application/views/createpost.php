<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create News Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tiny.cloud/1/53z14n57f346y9n3usw75o1aqkqdxcwnajjqau89u40fkq62/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <base href="<?= base_url() ?>">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #f8f9fc;
            --accent-color: #2e59d9;
            --text-color: #5a5c69;
            --light-gray: #f8f9fa;
        }
        body {
            background-color: #f8f9fc;
            color: var(--text-color);
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
        .container {
            max-width: 900px;
        }
        .card {
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            overflow: hidden;
        }
        .card-header {
            background-color: var(--primary-color);
            color: white;
            padding: 1.25rem 1.5rem;
            border-bottom: none;
        }
        .card-header h4 {
            font-weight: 700;
            margin: 0;
        }
        .card-body {
            padding: 2rem;
        }
        .form-label {
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }
        .form-control, .form-select {
            border: 1px solid #d1d3e2;
            border-radius: 0.35rem;
            padding: 0.75rem 1rem;
            transition: all 0.3s;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            transform: translateY(-1px);
        }
        .section-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-color);
            margin: 1.5rem 0 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--primary-color);
        }
        .category-select-wrapper {
            position: relative;
            width: 100%;
        }
        .main-category-select {
            border: 1px solid #d1d3e2;
            border-radius: 0.35rem;
            padding: 0.75rem 1rem;
            background: white;
            cursor: pointer;
            min-height: 46px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .subcategory-container {
            display: none;
            position: absolute;
            width: 100%;
            background: white;
            z-index: 1000;
            border: 1px solid #d1d3e2;
            border-radius: 0 0 0.35rem 0.35rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            max-height: 300px;
            overflow-y: auto;
        }
        .subcategory-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 0.5rem;
            padding: 1rem;
        }
        .subcategory-item {
            padding: 0.5rem;
            cursor: pointer;
            font-size: 0.875rem;
            transition: background-color 0.2s;
        }
        .subcategory-item:hover {
            background-color: var(--light-gray);
        }
        .subcategory-item.selected {
            background-color: rgba(78, 115, 223, 0.1);
            font-weight: 600;
        }
        .search-box {
            padding: 0.5rem;
        }
        .search-box input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #d1d3e2;
            border-radius: 0.35rem;
            font-size: 0.875rem;
        }
        .selected-category {
            padding: 0.375rem 0.75rem;
            background-color: var(--light-gray);
            border-radius: 1rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            display: inline-flex;
            align-items: center;
            font-size: 0.875rem;
            color: var(--text-color);
        }
        .selected-category .remove-category {
            margin-left: 0.5rem;
            color: #6c757d;
            cursor: pointer;
            font-size: 0.75rem;
        }
        .selected-category .remove-category:hover {
            color: #dc3545;
        }
        .image-upload-container {
            border: 2px dashed #d1d3e2;
            border-radius: 0.35rem;
            padding: 1.5rem;
            text-align: center;
            background-color: var(--light-gray);
            cursor: pointer;
            transition: all 0.3s;
        }
        .image-upload-container:hover {
            border-color: var(--primary-color);
            background-color: rgba(78, 115, 223, 0.05);
        }
        .image-upload-icon {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        .image-preview, .logo-preview {
            max-width: 100%;
            max-height: 200px;
            border-radius: 0.35rem;
            margin-top: 1rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        .logo-preview {
            max-height: 100px;
        }
        .required-field::after {
            content: " *";
            color: #dc3545;
        }
        .alert {
            border-radius: 0.35rem;
            padding: 1rem 1.5rem;
        }
        @media (max-width: 768px) {
            .card-body {
                padding: 1.5rem;
            }
            .subcategory-grid {
                grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            }
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center"><?= isset($post) ? "Edit News Post" : "Create News Post" ?></h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <a href="<?= base_url('auth/logout') ?>" class="btn btn-outline-danger float-end">
                        <i class="fas fa-sign-out-alt me-1"></i> Logout
                    </a>
                </div>
                <?php
                $formAction = isset($post) ? base_url('createnewspostcontroller/update/' . $post['id']) : base_url('createnewspostcontroller/store');
                ?>
                <form action="<?= $formAction ?>" method="post" enctype="multipart/form-data">
                    <?php if (isset($post)): ?>
                        <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                    <?php endif; ?>

                    <h5 class="section-title"><i class="fas fa-info-circle me-2"></i>Basic Information</h5>
                    <div class="mb-4">
                        <label for="title" class="form-label required-field">Title</label>
                        <input type="text" class="form-control" name="title" id="title"
                            value="<?= isset($post) ? htmlspecialchars($post['title']) : '' ?>" required onkeyup="generateSlug()" placeholder="Enter news title">
                    </div>
                    <div class="mb-4">
                        <label for="slug" class="form-label required-field">Slug</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="slug" id="slug"
                                value="<?= isset($post) ? htmlspecialchars($post['slug']) : '' ?>" required readonly>
                            <button class="btn btn-outline-secondary" type="button" onclick="generateSlug()">
                                <i class="fas fa-sync-alt"></i> Regenerate
                            </button>
                        </div>
                        <small class="text-muted">This will be used in the URL for the news</small>
                    </div>
                    <div class="mb-4">
                        <label class="form-label required-field">Category</label>
                        <div class="category-select-wrapper">
                            <div class="main-category-select" onclick="toggleMainCategoryDropdown()">
                                <span id="mainCategoryText"><?= isset($post) && !empty($post['main_category']) ? htmlspecialchars($post['main_category']) : 'Select a primary category' ?></span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="subcategory-container" id="subcategoryContainer">
                                <div class="search-box">
                                    <input type="text" placeholder="Search subcategories..." id="subcategorySearch" onkeyup="filterSubcategories()">
                                </div>
                                <div class="subcategory-grid" id="subcategoryGrid"></div>
                            </div>
                            <input type="hidden" name="main_category" id="selectedMainCategory"
                                value="<?= isset($post) ? htmlspecialchars($post['main_category']) : '' ?>" required>
                            <input type="hidden" name="category" id="selectedCategory"
                                value="<?= isset($post) ? htmlspecialchars($post['category']) : '' ?>" required>
                            <div id="categoryDisplay" class="mt-2">
                                <?php if (isset($post) && !empty($post['category'])): ?>
                                    <?php $categories = explode(',', $post['category']); foreach ($categories as $cat): ?>
                                        <span class="selected-category">
                                            <?= htmlspecialchars($cat) ?>
                                            <span class="remove-category" onclick="removeCategory('<?= htmlspecialchars($cat) ?>')">
                                                <i class="fas fa-times"></i>
                                            </span>
                                        </span>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <span class="text-muted">Select one or more subcategories</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="provided" class="form-label required-field">Provided By</label>
                        <select class="form-select" name="provided" id="provided" required onchange="updateLogoPreview()">
                            <option value="">Select an option</option>
                            <option value="Business Wire" data-logo="<?= base_url('assets/logos/business_wire.png') ?>" <?= isset($post) && $post['provided'] == "Business Wire" ? "selected" : "" ?>>Business Wire</option>
                            <option value="PR Newswire" data-logo="<?= base_url('assets/logos/pr_newswire.png') ?>" <?= isset($post) && $post['provided'] == "PR Newswire" ? "selected" : "" ?>>PR Newswire</option>
                            <option value="PRWeb" data-logo="<?= base_url('assets/logos/PRWeb_Logo.png') ?>" <?= isset($post) && $post['provided'] == "PRWeb" ? "selected" : "" ?>>PRWeb</option>
                            <option value="GlobeNewswire" data-logo="<?= base_url('assets/logos/globenewswire.png') ?>" <?= isset($post) && $post['provided'] == "GlobeNewswire" ? "selected" : "" ?>>GlobeNewswire</option>
                        </select>
                        <div id="logoPreview" class="mt-2 text-center">
                            <?php if (isset($post) && !empty($post['provider_logo'])): ?>
                                <img src="<?= base_url($post['provider_logo']) ?>" class="logo-preview" alt="Provider Logo">
                            <?php else: ?>
                                <img id="logoImage" class="logo-preview" style="display: none;" alt="Provider Logo">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="image" class="form-label">Featured Image</label>
                        <div class="image-upload-container" onclick="document.getElementById('image').click()">
                            <div class="image-upload-icon">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <p class="mb-2">Click to upload or drag and drop</p>
                            <p class="small text-muted">JPG, PNG, or WEBP (Max. 5MB)</p>
                            <input type="file" class="d-none" name="image" id="image" 
                                accept=".jpg,.jpeg,.png,.webp" onchange="previewImage(event)">
                        </div>
                        <?php if (isset($post) && !empty($post['image'])): ?>
                            <div class="text-center mt-3">
                                <img src="<?= base_url($post['image']) ?>?t=<?= time() ?>" id="imagePreview" class="image-preview">
                                <div class="mt-2">
                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeImage()">
                                        <i class="fas fa-trash me-1"></i> Remove Image
                                    </button>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="text-center mt-3">
                                <img id="imagePreview" class="image-preview" style="display: none;">
                            </div>
                        <?php endif; ?>
                    </div>
                    <h5 class="section-title"><i class="fas fa-edit me-2"></i>Content</h5>
                    <div class="mb-4">
                        <label for="blogBody" class="form-label required-field">Body</label>
                        <textarea name="content" id="blogBody" class="form-control"><?= isset($post) ? htmlspecialchars($post['content']) : '' ?></textarea>
                    </div>
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save me-2"></i><?= isset($post) ? "Update News" : "Create News" ?>
                        </button>
                    </div>
                </form>
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success mt-4"><?= $this->session->flashdata('success'); ?></div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger mt-4"><?= $this->session->flashdata('error'); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        tinymce.init({
            selector: '#blogBody',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            height: 400
        });
        const categoryData = {
            'MarTech': [
                'Advertising', 'AI', 'Analytics', 'Business Intelligence', 'CDP', 'Communications',
                'Content Management', 'Content Marketing', 'Conversational Marketing', 'CRM',
                'Customer Engagement', 'Customer Experience', 'Cybersecurity', 'Data Management',
                'Digital Asset Management', 'Digital Experience', 'Digital Marketing',
                'Digital Transformation', 'E-commerce', 'Email Marketing', 'Marketing Automation',
                'Marketing Cloud', 'Sales', 'SEO/SEM', 'Social Media', 'Supply Chain Management'
            ],
            'HRTech': [
                'AI', 'Cybersecurity', 'Diversity, Equity & Inclusion (DEI)', 'Employee Experience',
                'Employee Wellness', 'HCM', 'HR Analytics', 'HR Automation', 'HR Cloud',
                'Learning & Development', 'Payroll & Benefits', 'Remote Work', 'Talent Acquisition',
                'Workforce Management'
            ],
            'Fintech': [
                'Banking', 'Blockchain', 'Cryptocurrency', 'Decentralized Finance', 'Financial Services',
                'Insurance', 'Investment', 'Lending & Credit', 'Payments & Wallets', 'Security'
            ],
            'Consumer Tech': [
                '5G Devices', 'AI', 'Audio & Visual Technology', 'Computers', 'Consumer Health',
                'Home Appliances', 'In-home Entertainment', 'Mobile', 'Online Retail', 'Security',
                'Smart Home Technology', 'Social Networking', 'Wearable Technology'
            ]
        };
        let currentMainCategory = '';
        document.addEventListener("DOMContentLoaded", function() {
            initializeMainCategories();
            updateCategoryDisplay();
            updateLogoPreview();
            <?php if (isset($post) && !empty($post['image'])): ?>
                document.getElementById('imagePreview').style.display = 'block';
            <?php endif; ?>
        });
        function initializeMainCategories() {
            const mainCategoryText = document.getElementById('mainCategoryText');
            const selectedMainCategory = document.getElementById('selectedMainCategory').value;
            if (selectedMainCategory) {
                currentMainCategory = selectedMainCategory;
                mainCategoryText.textContent = selectedMainCategory;
                initializeSubcategories(selectedMainCategory);
            }
        }
        function toggleMainCategoryDropdown() {
            const container = document.getElementById('subcategoryContainer');
            container.style.display = container.style.display === 'block' ? 'none' : 'block';
            if (container.style.display === 'block') {
                document.getElementById('subcategorySearch').focus();
                if (!currentMainCategory) {
                    const grid = document.getElementById('subcategoryGrid');
                    grid.innerHTML = Object.keys(categoryData).map(mainCat => `
                        <div class="subcategory-item" onclick="selectMainCategory('${mainCat}')">
                            ${mainCat}
                        </div>
                    `).join('');
                }
            }
        }
        function selectMainCategory(mainCat) {
            currentMainCategory = mainCat;
            document.getElementById('mainCategoryText').textContent = mainCat;
            document.getElementById('selectedMainCategory').value = mainCat;
            document.getElementById('selectedCategory').value = '';
            updateCategoryDisplay();
            initializeSubcategories(mainCat);
            console.log('Selected main category:', mainCat);
        }
        function initializeSubcategories(mainCat) {
            const grid = document.getElementById('subcategoryGrid');
            const selectedCategories = document.getElementById('selectedCategory').value.split(',').filter(cat => cat);
            grid.innerHTML = categoryData[mainCat].map(subCat => `
                <div class="subcategory-item ${selectedCategories.includes(subCat) ? 'selected' : ''}" 
                     data-subcategory="${subCat}" onclick="toggleSubcategorySelection(event, '${subCat}')">
                    ${subCat}
                </div>
            `).join('');
            console.log('Initialized subcategories for:', mainCat, selectedCategories);
        }
        function toggleSubcategorySelection(event, subCat) {
            event.stopPropagation();
            const selectedCategoriesInput = document.getElementById('selectedCategory');
            let selectedCategories = selectedCategoriesInput.value ? selectedCategoriesInput.value.split(',').filter(cat => cat) : [];
            const item = event.currentTarget;
            if (selectedCategories.includes(subCat)) {
                selectedCategories = selectedCategories.filter(cat => cat !== subCat);
                item.classList.remove('selected');
            } else {
                selectedCategories.push(subCat);
                item.classList.add('selected');
            }
            selectedCategoriesInput.value = selectedCategories.join(',');
            updateCategoryDisplay();
            console.log('Toggled subcategory:', subCat, 'New categories:', selectedCategories);
        }
        function filterSubcategories() {
            const search = document.getElementById('subcategorySearch').value.toLowerCase();
            const items = document.querySelectorAll('.subcategory-item');
            items.forEach(item => {
                const text = item.textContent.toLowerCase();
                item.style.display = text.includes(search) ? 'block' : 'none';
            });
            console.log('Filtered subcategories with search:', search);
        }
        function updateCategoryDisplay() {
            const selectedCategoriesInput = document.getElementById('selectedCategory');
            const categoryDisplay = document.getElementById('categoryDisplay');
            const selectedCategories = selectedCategoriesInput.value ? selectedCategoriesInput.value.split(',').filter(cat => cat) : [];
            if (selectedCategories.length > 0) {
                categoryDisplay.innerHTML = selectedCategories.map(category => `
                    <span class="selected-category">
                        ${category}
                        <span class="remove-category" onclick="removeCategory('${category}')">
                            <i class="fas fa-times"></i>
                        </span>
                    </span>
                `).join('');
            } else {
                categoryDisplay.innerHTML = '<span class="text-muted">Select one or more subcategories</span>';
            }
            console.log('Updated category display:', selectedCategories);
        }
        function removeCategory(category) {
            event.stopPropagation();
            const selectedCategoriesInput = document.getElementById('selectedCategory');
            let selectedCategories = selectedCategoriesInput.value.split(',').filter(cat => cat);
            selectedCategories = selectedCategories.filter(cat => cat !== category);
            selectedCategoriesInput.value = selectedCategories.join(',');
            const item = document.querySelector(`.subcategory-item[data-subcategory="${category}"]`);
            if (item) item.classList.remove('selected');
            updateCategoryDisplay();
            console.log('Removed category:', category, 'New categories:', selectedCategories);
        }
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.category-select-wrapper')) {
                document.getElementById('subcategoryContainer').style.display = 'none';
            }
        });
        function generateSlug() {
            let title = document.getElementById("title").value;
            if (title.trim() === '') return;
            let slug = title.toLowerCase()
                .replace(/ /g, '-')
                .replace(/[^a-z0-9-]/g, '')
                .replace(/-+/g, '-')
                .replace(/^-|-$/g, '');
            document.getElementById("slug").value = slug;
        }
        function updateLogoPreview() {
            const select = document.getElementById('provided');
            const logoImage = document.getElementById('logoImage');
            const selectedOption = select.options[select.selectedIndex];
            const logoUrl = selectedOption.getAttribute('data-logo');
            if (logoUrl) {
                logoImage.src = logoUrl;
                logoImage.style.display = 'block';
            } else {
                logoImage.style.display = 'none';
            }
        }
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.style.display = 'block';
                const uploadContainer = document.querySelector('.image-upload-container');
                if (uploadContainer) uploadContainer.style.display = 'none';
            };
            if (event.target.files && event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        }
        function removeImage() {
            if (confirm('Are you sure you want to remove this image?')) {
                document.getElementById('imagePreview').src = '';
                document.getElementById('imagePreview').style.display = 'none';
                document.getElementById('image').value = '';
                const uploadContainer = document.querySelector('.image-upload-container');
                if (uploadContainer) uploadContainer.style.display = 'block';
            }
        }
    </script>
</body>
</html>