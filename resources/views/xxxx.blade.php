<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Image Preview Rotation</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#fuUpload").change(function () {
                var dvPreview = $("#dvPreview");
                dvPreview.html("");
                $($(this)[0].files).each(function () {
                    var file = $(this);
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var divImagePreview = $("<div/>");
                        divImagePreview.attr("style", "display: flex; align-items: center;");

                        var hiddenRotation = $("<input type='hidden' id='hfRotation' value='0' />");
                        divImagePreview.append(hiddenRotation);

                        var btnLeft = $("<button class='left'>Left</button>");
                        divImagePreview.append(btnLeft);

                        var img = $("<img />");
                        img.attr("style", "height: 100px; width: 100px;");
                        img.attr("class", "preview");
                        img.attr("src", e.target.result);
                        divImagePreview.append(img);

                        var btnRight = $("<button class='right'>Right</button>");
                        divImagePreview.append(btnRight);

                        dvPreview.append(divImagePreview);
                        dvPreview.append("<br/>");
                    }
                    reader.readAsDataURL(file[0]);
                });
            });
            $('body').on('click', '.left,.right', function () {
                var hfRotation = $(this).closest('div').find('[id*=hfRotation]');
                var img = $(this).closest('div').find('.preview');
                var rotation = parseInt($(hfRotation).val());
                if ($(this).attr('class') == "left") {
                    rotation = (rotation + 90) % 360;
                } else if ($(this).attr('class') == "right") {
                    rotation = (rotation - 90) % 360;
                }
                $(img).css({ 'transform': 'rotate(' + rotation + 'deg)' });
                $(hfRotation).val(rotation);
            });
        });
    </script>
</head>
<body>
    <input type="file" name="file" id="fuUpload" accept="image/*" multiple="multiple" /><hr />
    <div id="dvPreview"></div>
</body>
</html>