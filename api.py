import requests

url = "https://eyemax.test/api/receive-marco-ar"

payload = {'location': '1'}
files = [
  ('marco', open('C:/Users/lines/Downloads/marco-output.xml','rb'))
]
headers = {
  'Content-Type': 'multipart/form-data'
}

response = requests.request("POST", url, data = payload, files = files, verify=False)

print(response.text.encode('utf8'))
