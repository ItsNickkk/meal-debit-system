console.log('System Initializing');

const electron = require("electron");
const app = electron.app;
const BrowserWindow = electron.BrowserWindow;
const path = require("path");
const url = require("url");
const ipc = electron.ipcMain;
let {ipcMain} = electron;
ipcMain.on('resize', function (e, x, y) {
    win.setSize(x, y);
});

let win; //reference for window

function createWindow() {
	win = new BrowserWindow({height: 500,width: 400, minHeight: 500,minWidth: 400, frame: false}); // create new browser window
	
	win.loadURL(url.format({
		pathname: path.join(__dirname, 'index.html'),
		protocol: 'file',
		slashes: true
		}));
	//win.webContents.openDevTools(); //Remove comment to access element when launching
	win.on('closed', () => {
		win = null;
	})
};

app.on('ready', createWindow);
console.log('System Up and Running!');

app.on('certificate-error', function(event, webContents, url, error, 
  certificate, callback) {
      event.preventDefault();
      callback(true);
});