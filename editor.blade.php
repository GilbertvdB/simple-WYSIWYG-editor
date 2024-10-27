<style>
    /* Simple styles for the editor */
    #editor {
        width: 100%;
        min-height: 300px;
        border: 1px solid #ccc;
        padding: 10px;
        margin-top: 10px;
        background-color: #fff;
        font-family: Arial, sans-serif;
        outline: none;
        transition: border-color 0.3s ease; /* Smooth transition for border */
    }
    #editor:focus {
        border: 1px solid blue;
    }
    #toolbar button {
        font-size: 16px;
        padding: 5px;
        cursor: pointer;
    }
    #toolbar button.active {
        background-color: #d3d3d3;
    }
    #editor h1, #editor h2, #editor h3 {
    font-family: Arial, sans-serif;
    margin: 10px 0;
    }

    #editor h1 {
        font-size: 2em;
        font-weight: bold;
    }

    #editor h2 {
        font-size: 1.75em;
        font-weight: bold;
    }

    #editor h3 {
        font-size: 1.5em;
        font-weight: bold;
    }

    #editor ul {
        list-style-type: disc; /* Bullets for unordered lists */
        margin-left: 20px; /* Indent for better visibility */
    }

    #editor ol {
        list-style-type: decimal; /* Numbers for ordered lists */
        margin-left: 20px; /* Indent for better visibility */
    }

    /* Optional: Style for list items */
    #editor ul li, 
    #editor ol li {
        margin-bottom: 5px; /* Space between list items */
    }

    #editor a {
        color: #1a73e8;
        text-decoration: underline;
        cursor: pointer;
    }

    #editor a:hover {
        color: #0c47b7;
    }
</style>

<div class="border rounded-lg px-2 py-2 bg-white">
    <!-- Toolbar for formatting options -->
    <div class="border flex justify-between rounded-full px-4 bg-slate-100"> 
        <div id="toolbar" class="flex space-x-1 ">
            <button type="button" onclick="formatText('bold')" class="px-3 py-1 hover:bg-gray-200 rounded min-w-8"><strong>B</strong></button>
            <button type="button" onclick="formatText('italic')" class="px-3 py-1 hover:bg-gray-200 rounded min-w-8"><i>I&nbsp;</i></button>
            <button type="button" onclick="formatText('underline')" class="px-3 py-1 hover:bg-gray-200 rounded min-w-8"><U>U</U></button>
            
            <button type="button" onclick="formatText('insertOrderedList')" class="px-3 py-1 hover:bg-gray-200 rounded min-w-8">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.242 5.992h12m-12 6.003H20.24m-12 5.999h12M4.117 7.495v-3.75H2.99m1.125 3.75H2.99m1.125 0H5.24m-1.92 2.577a1.125 1.125 0 1 1 1.591 1.59l-1.83 1.83h2.16M2.99 15.745h1.125a1.125 1.125 0 0 1 0 2.25H3.74m0-.002h.375a1.125 1.125 0 0 1 0 2.25H2.99" />
                </svg>
            </button>

            <button type="button" onclick="formatText('insertUnorderedList')" class="px-3 py-1 hover:bg-gray-200 rounded min-w-8">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
            </button>

            <!-- Heading Options -->
            <button type="button" onclick="formatText('formatBlock', 'h1')" class="px-3 py-1 hover:bg-gray-200 rounded min-w-8">H1</button>
            <button type="button" onclick="formatText('formatBlock', 'h2')" class="px-3 py-1 hover:bg-gray-200 rounded min-w-8">H2</button>
            <button type="button" onclick="formatText('formatBlock', 'h3')" class="px-3 py-1 hover:bg-gray-200 rounded min-w-8">H3</button>
            
            <!-- Links -->
            <button type="button" onclick="createLink()" class="px-3 py-1 hover:bg-gray-200 rounded min-w-8">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                </svg>
            </button>

            <!-- Adding Images -->
            <button type="button" onclick="addImage()" class="px-3 py-1 hover:bg-gray-200 rounded min-w-8">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
            </button>
        </div>
        <!-- Code view -->
        <button type="button" onclick="toggleHTMLView()" class="px-3 py-1 hover:bg-gray-200 rounded min-w-8"><./></button>

    </div>

    <!-- Editable area -->
    <div id="editor" contenteditable="true" class="border rounded-md p-4 mt-2 bg-white min-h-[300px]">
        {!! old($name, $content ?? '') !!}
    </div>

    <!-- Hidden input field to store editor content -->
    <input type="hidden" name="{{ $name }}" id="editorContent">
</div>

<script>
    // Function to format text
    function formatText(command, value = null) {
        if (command === 'formatBlock' && value) {
            const selection = window.getSelection();
            const currentBlock = selection.anchorNode.parentNode.closest(value);
            
            // Toggle heading off if already applied
            if (currentBlock) {
                document.execCommand('formatBlock', false, 'p');
            } else {
                document.execCommand(command, false, value);
            }
        } else {
            document.execCommand(command, false, value);
        }
    }

    // Function to create a link
    function createLink() {
        const url = prompt("Enter the URL:");
        if (url) {
            document.execCommand('createLink', false, url);
        }
    }

    // Function to add an image
    function addImage() {
        const imageUrl = prompt("Enter the image URL:");
        if (imageUrl) {
            document.execCommand('insertImage', false, imageUrl);
        }
    }

    let isHTMLView = false; // Track whether we're in HTML mode or not

    function toggleHTMLView() {
        const editor = document.getElementById('editor'); // Your editor div
        const button = document.querySelector('button[onclick="toggleHTMLView()"]'); // Target the button
        
        if (isHTMLView) {
            // If currently in HTML view, switch back to WYSIWYG mode
            editor.innerHTML = editor.textContent; // Replace the text content with HTML markup
            button.textContent = '<./>'; // Update button text
        } else {
            // If currently in WYSIWYG view, switch to HTML view
            editor.textContent = editor.innerHTML; // Replace the HTML markup with raw text content
            button.textContent = 'Text'; // Update button text
        }
        
        isHTMLView = !isHTMLView; // Toggle the view mode
    }

    // Capture the content of the editor before submitting the form
    document.addEventListener('submit', function () {
        let editorContent = document.getElementById('editor').innerHTML;
        document.getElementById('editorContent').value = editorContent;
    });
</script>
