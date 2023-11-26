from PIL import Image, ImageFilter, ImageEnhance
import os

def main():
    # 画像が保存されているディレクトリ
    directory = 'storage/app/public/jackets'

    # 画像ファイルのリストを取得
    i = 0
    images = []
    for img in os.listdir(directory):
        if img != "NO_IMAGE.jpeg":
            i += 1
            with Image.open(os.path.join(directory, img)) as im:
                images.append(im.copy())

        if i >= 100:
            break

    # 最初の画像のサイズを取得
    img_width, img_height = images[0].size

    # 新しい画像のキャンバスを作成
    output = Image.new('RGB', (img_width*10, img_height*10))

    # 画像をキャンバスに配置
    for i, img in enumerate(images[0:100]):
        # 画像をリサイズ
        resized_img = img.resize((img_width, img_height))
        output.paste(resized_img, ((i % 10) * img_width, (i // 10) * img_height))

    # 画像サイズを変更
    output = output.resize((1920, 1920))

    # # ブラーを適用
    # output = output.filter(ImageFilter.GaussianBlur(2))

    # # 色調を調整して灰色にする
    # enhancer = ImageEnhance.Color(output)
    # output = enhancer.enhance(0.5)

    # # 紺色に調整
    # output = output.convert("RGB")
    # d = output.getdata()

    # new_image = []
    # for item in d:
    #     # 紺色に調整
    #     new_image.append((int(item[0]*0.5), int(item[1]*0.5), int(item[2]*0.7)))  # RGB値を調整

    # output.putdata(new_image)

    # 結果を保存
    output.save('storage/app/public/top_image.png')

if __name__ == '__main__':
    main()
