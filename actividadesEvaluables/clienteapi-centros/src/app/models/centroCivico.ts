import {Actividades} from './actividades';
import {Instalacion} from './instalacion';

export interface CentroCivico {
    id: number;
    nombre: string;
    direccion: string;
    tel_contacto: string;
    horario: string;
    foto: string;
    // actividades: Actividades[];
    // instalaciones: Instalacion[];
}