import requests, random
from bs4 import BeautifulSoup

url = 'http://localhost/meal-debit-system/actionScripts/registerAction.php'
#path = './names.json'
#with open(path) as json_data:
    #nameList = json.load(json_data)

def nameGrab():
    url = 'https://www.top50names.com/'
    page = requests.get(url)
    page.raise_for_status()
    nameList = []
    soup = BeautifulSoup(page.text, 'lxml')
    for table in soup.find_all('table'):
        for name in table.find_all('tr'):
            Name = name.select('a')
            for item in Name:
                nameList.append(item.text)
    return nameList

nameList = nameGrab()
for i in range(25):
    try:
        rand = nameList[i] + str(random.randint(1000,9999))
        requests.post(url, data={
            'ic': f'{random.randint(600000000000,900000000000)}',
            'name':	nameList[i],
            'phone': f'0{random.randint(100000000,199999999)}',
            'email':f'{rand}@mail.com',
            'username': rand,
            'password':	rand
        })
        print('Registering user {} with password {}...'.format(rand, rand))
    except:
        print(f'An error has occured when registering user {rand}.')

print('It is done.')