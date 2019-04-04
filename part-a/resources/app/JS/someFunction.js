function resize(x, y){
    const electron = require('electron');
    const ipc = electron.ipcRenderer;
    let {ipcRenderer} = electron;
    ipc.send('resize', x, y);
}