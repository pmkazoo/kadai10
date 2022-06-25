window.addEventListener('load', () => {
    const aquarium = document.querySelector("#aquarium-area");  //getElementById()等でも可。オブジェクトが取れれば良い。
    const aquarium_ctx = aquarium.getContext("2d");

    const aquarium_img = new Image();
    aquarium_img.src = "./img/aquarium.png";  // 画像のURLを指定

    // 現在の線の色を保持する変数(デフォルトは黒(#000000)とする)
    let currentColor = '#000000';

    aquarium_img.onload = () => {
        aquarium_ctx.drawImage(aquarium_img, 0, 0);
        dispAquarium();
    };

    function dispAquarium(){
        updateAquarium();

        for(let i=0; i<js_array.length; i++){
            let value = js_array[i];

            let x = Math.random()*(aquarium.width-aquarium.height*0.3);
            let y = Math.random()*aquarium.height*0.7;

            let image = new Image();
            image.src = value;
            image.onload = function () {
                aquarium_ctx.drawImage(image, x, y,aquarium.height*0.3, aquarium.height*0.3);
            }
        }
    }

    function updateAquarium(){
        aquarium_ctx.clearRect(0, 0, aquarium.width, aquarium.height);
        const aquarium_img = new Image();
        aquarium_img.src = "./img/aquarium.png";  // 画像のURLを指定
    
        aquarium_img.onload = () => {
            aquarium_ctx.drawImage(aquarium_img, 0, 0);
        };
    }

});