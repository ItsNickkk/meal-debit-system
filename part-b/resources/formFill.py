import nameGrab, time, random, pyautogui

nameList = nameGrab.nameGrab()

for i in range(1,6):
    print(i)
    time.sleep(1)

rand = f'{random.choice(nameList)}{random.randint(0000,9999)}'

data = {
            'ic': f'{random.randint(600000000000,900000000000)}',
            'name':	rand,
            'phone': f'0{random.randint(100000000,199999999)}',
            'email':f'{rand}@mail.com',
            'username': rand,
            'password':	rand
}

for item in data:
    pyautogui.typewrite(data[item])
    pyautogui.press('tab')