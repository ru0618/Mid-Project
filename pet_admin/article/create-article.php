<?php
require_once("db_connect.php");

$sqlCategory = "SELECT * FROM article_category ORDER BY id ASC";
$resultCate = $conn->query($sqlCategory);
$cateRows = $resultCate->fetch_all(MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">

<head>
  <title>Create Article</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/super-build/ckeditor.js"></script>


</head>

<body>
  <div class="container">
    <div class="py-2">
      <a class="btn btn-warning" href="article-list.php">回文章列表</a>
    </div>
    <h2 class="py-2">新增文章</h2>
    <form action="doArticleCreate.php" method="post" enctype="multipart/form-data">
      <div class="mb-2">
        <label for="">選取文章類別</label>
        <select name="category" class="form-select">
          <option value="">請選取文章類別</option>
          <?php foreach ($cateRows as $category) : ?>
            <option value="<?= $category["id"] ?>"><?= $category["name"] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <!-- <div class="btn-group">
        <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          請選取文章類別
        </button>
        <input type="hidden" name="category" value="">
        <ul class="dropdown-menu">
          <?php foreach ($cateRows as $category) : ?>
            <li><a class="dropdown-item" href="#" data-category="<?= $category["id"] ?>"><?= $category["name"] ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div> -->
      <div class="mb-2">
        <label for="">選取圖片</label>
        <input type="file" name="image" class="form-control" required>
      </div>
      <div class="mb-2">
        <label for="">文章標題</label>
        <input type="text" class="form-control" name="title">
      </div>
      <div class="mb-2">
        <label class="" for="">文章摘要</label>
        <textarea class="form-control" name="abstract" id="" cols="30" rows="10"></textarea>
      </div>
      <div class="mb-2">
        <label class="" for="">文章內容</label>
        <textarea class="form-control" name="content" id="editor" cols="30" rows="10"></textarea>
      </div>
      <button class="btn btn-warning" type="submit">送出</button>
    </form>
  </div>

  <script>
    var dropdownToggle = document.querySelector(".dropdown-toggle");
    var dropdownMenu = document.querySelector(".dropdown-menu");

    if (dropdownToggle && dropdownMenu) {
      dropdownMenu.addEventListener("click", function(e) {
        e.preventDefault();
        console.log("點擊事件觸發了！");
        var selectedOption = e.target;

        var categoryName = selectedOption.textContent;

        dropdownToggle.textContent = categoryName;

        var categoryID = selectedOption.dataset.category;
        document.querySelector('input[name="category"]').value = categoryID;
      });
    }
  </script>
  <script>
    CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {

      toolbar: {
        items: [
          'exportPDF', 'exportWord', '|',
          'findAndReplace', 'selectAll', '|',
          'heading', '|',
          'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
          'bulletedList', 'numberedList', 'todoList', '|',
          'outdent', 'indent', '|',
          'undo', 'redo',
          '-',
          'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
          'alignment', '|',
          'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
          'specialCharacters', 'horizontalLine', 'pageBreak', '|',
          'textPartLanguage', '|',
          'sourceEditing'
        ],
        shouldNotGroupWhenFull: true
      },

      list: {
        properties: {
          styles: true,
          startIndex: true,
          reversed: true
        }
      },

      heading: {
        options: [{
            model: 'paragraph',
            title: 'Paragraph',
            class: 'ck-heading_paragraph'
          },
          {
            model: 'heading1',
            view: 'h1',
            title: 'Heading 1',
            class: 'ck-heading_heading1'
          },
          {
            model: 'heading2',
            view: 'h2',
            title: 'Heading 2',
            class: 'ck-heading_heading2'
          },
          {
            model: 'heading3',
            view: 'h3',
            title: 'Heading 3',
            class: 'ck-heading_heading3'
          },
          {
            model: 'heading4',
            view: 'h4',
            title: 'Heading 4',
            class: 'ck-heading_heading4'
          },
          {
            model: 'heading5',
            view: 'h5',
            title: 'Heading 5',
            class: 'ck-heading_heading5'
          },
          {
            model: 'heading6',
            view: 'h6',
            title: 'Heading 6',
            class: 'ck-heading_heading6'
          }
        ]
      },

      placeholder: 'Welcome to CKEditor 5!',

      fontFamily: {
        options: [
          'default',
          'Arial, Helvetica, sans-serif',
          'Courier New, Courier, monospace',
          'Georgia, serif',
          'Lucida Sans Unicode, Lucida Grande, sans-serif',
          'Tahoma, Geneva, sans-serif',
          'Times New Roman, Times, serif',
          'Trebuchet MS, Helvetica, sans-serif',
          'Verdana, Geneva, sans-serif'
        ],
        supportAllValues: true
      },
      fontSize: {
        options: [10, 12, 14, 'default', 18, 20, 22],
        supportAllValues: true
      },
      htmlSupport: {
        allow: [{
          name: /.*/,
          attributes: true,
          classes: true,
          styles: true
        }]
      },
      htmlEmbed: {
        showPreviews: true
      },
      link: {
        decorators: {
          addTargetToExternalLinks: true,
          defaultProtocol: 'https://',
          toggleDownloadable: {
            mode: 'manual',
            label: 'Downloadable',
            attributes: {
              download: 'file'
            }
          }
        }
      },
      mention: {
        feeds: [{
          marker: '@',
          feed: [
            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
            '@sugar', '@sweet', '@topping', '@wafer'
          ],
          minimumCharacters: 1
        }]
      },
      removePlugins: [
        'CKBox',
        'CKFinder',
        'EasyImage',
        'RealTimeCollaborativeComments',
        'RealTimeCollaborativeTrackChanges',
        'RealTimeCollaborativeRevisionHistory',
        'PresenceList',
        'Comments',
        'TrackChanges',
        'TrackChangesData',
        'RevisionHistory',
        'Pagination',
        'WProofreader',
        'MathType',
        'SlashCommand',
        'Template',
        'DocumentOutline',
        'FormatPainter',
        'TableOfContents'
      ]
    });
  </script>
</body>

</html>