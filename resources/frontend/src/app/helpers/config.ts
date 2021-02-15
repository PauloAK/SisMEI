import { environment } from "../../environments/environment";
import { Injectable } from '@angular/core';

@Injectable()
export class Config {
    private apiURL = environment['API_URL'];

    public getApiUrl() {
        return this.apiURL;
    }
}
