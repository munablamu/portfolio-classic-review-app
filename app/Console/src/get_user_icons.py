import os
import shutil
import requests

def main():
    for i in range(100):
        response = requests.get('https://picsum.photos/200')
        filename = f'storage/app/public/user_icons/user_{i+1}.jpg'

        with open(filename, 'wb') as f:
            f.write(response.content)

        print(f'save {filename}')


        filename = f'storage/app/private/user_icons/user_{i+1}.jpg'

        with open(filename, 'wb') as f:
            f.write(response.content)

        print(f'save {filename}')


if __name__ == '__main__':
    main()
