# simple-WYSIWYG-editor
Simple lightweight wysiwyg editor blade component for Laravel.

The following is a simple wysiwyg editor with some basic functions.
It uses tailwind css, icons from heroicons, basic css and js.

Create a compoenent using laravel:
```bash
 php artisan make:component Editor
```

Use the component like: </br>
Create view:
 ```blade 
 <x-editor name="content" />
 ``` 
Edit View:
```blade 
 <x-editor name="content" :content"$blog->content" />
 ```
Example:
```blade
<!-- WYSIWYG Editor Component -->
<div class="mt-4">
    <x-input-label for="content" :value="__('Content')" />
    <x-editor name="content" />
    <x-input-error :messages="$errors->get('content')" class="mt-2" />
</div>
```

Features:

Bold, Italic, Underline, Numbered List, Bullet List, Heading1, H2, H3, Link, Image Url and a raw code view button.

![editor-text](https://github.com/user-attachments/assets/644a7bf2-4b4b-4717-b63c-468b8a504609)

Raw code view:

![editor-raw](https://github.com/user-attachments/assets/1eda997f-a6ec-494b-bbc3-666383043ad5)
