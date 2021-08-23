<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Google Vision API</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <style>
      body {
        margin: 30px 0;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col">
          <form id="detectImageForm">
            <div class="form-group">
              <div class="custom-file">
                <input
                  type="file"
                  class="custom-file-input"
                  id="imageFile"
                  accept="image/*"
                />
                <label class="custom-file-label" for="imageFile"
                  >Choose image file</label
                >
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <img id="imagePreview" height="200" width="380" />
        </div>
        <div class="col" id="result"></div>
      </div>
    </div>
    <script>
      const detectImageForm = document.querySelector("#detectImageForm");
      const imageFile = detectImageForm.querySelector("#imageFile");
      const imagePreview = document.querySelector("#imagePreview");
      const result = document.querySelector("#result");
      const setImagePreview = async () => {
        const imageBase64String = await getImageBase64String();
        imagePreview.setAttribute("src", imageBase64String);
      };
      const detectImage = async () => {
        const imageBase64String = await getImageBase64String();
        const data = {
          requests: [
            {
              image: {
                content: imageBase64String.replace(/^data:.+;base64,/, "")
              },
              features: [{ type: "TEXT_DETECTION" }]
            }
          ]
        };
        const url = "https://vision.googleapis.com/v1/images:annotate?key=AIzaSyAYROqDzrounZaB4J8etaV4yhBhhELZNE8";
        const response = await fetch(url, {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify(data)
        });
        const jsonResponse = await response.json();
        for (const value of jsonResponse.responses) {
          console.log(value);
          result.textContent = value.fullTextAnnotation.text;
        }
      };
      const getImageBase64String = async () => {
        return await toBase64(imageFile.files[0]);
      };
      const toBase64 = file =>
        new Promise((resolve, reject) => {
          const reader = new FileReader();
          reader.readAsDataURL(file);
          reader.onload = () => resolve(reader.result);
          reader.onerror = error => reject(error);
        });
      imageFile.addEventListener("change", e => {
        setImagePreview();
      });
      detectImageForm.addEventListener("submit", e => {
        e.preventDefault();
        detectImage();
      });
    </script>
  </body>
</html>