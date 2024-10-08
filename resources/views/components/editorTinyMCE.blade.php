<!-- TinyMCE and Slugify Script -->

<!-- Include TinyMCE via CDN -->
<script src="https://cdn.tiny.cloud/1/82ad4gugryc9d560yfp3vpor3re70azat6g38vn6rnpor6ym/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Initialize TinyMCE -->
<script>
    tinymce.init({
        selector: 'textarea',
        height: 300,
        menubar: false,
        plugins: [
            'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
            'copy', 'pastetext', 'preview', 'blockquote'
        ],
        toolbar: 'undo redo pastetext copy| blocks fontfamily fontsize | bold italic underline strikethrough backcolor forecolor blockquote | link image media table codesample | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat  preview',
        // tinycomments_mode: 'embedded',
        // tinycomments_author: 'Author name',
        // mergetags_list: [
        //     { value: 'First.Name', title: 'First Name' },
        //     { value: 'Email', title: 'Email' },
        // ],
        codesample_languages: [
            { text: 'HTML/XML', value: 'markup' },
            { text: 'JavaScript', value: 'javascript' },
            { text: 'CSS', value: 'css' },
            { text: 'PHP', value: 'php' },
            { text: 'Ruby', value: 'ruby' },
            { text: 'Python', value: 'python' },
            { text: 'Java', value: 'java' },
            { text: 'C', value: 'c' },
            { text: 'C#', value: 'csharp' },
            { text: 'C++', value: 'cpp' }
        ],
        content_css: '//www.tiny.cloud/css/codepen.min.css',
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
    });
</script>

