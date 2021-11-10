import { setImageEvent, setInputValueEvent, setVideoEvent, setEditFile } from "./events.js";

setInputValueEvent(".input_rename_path", "rename");
setInputValueEvent("#input_delete_path", "delete");
setImageEvent();
setVideoEvent();
setEditFile();