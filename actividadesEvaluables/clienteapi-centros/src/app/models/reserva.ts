export interface Reserva {
    id: number;
    nom_solicitante: string;
    telefono: number;
    correo: string;
    instalaciones_id: string;
    fechahora_inicio: string;
    fechahora_final: string;
    estado: string;
    usuario_id: number;
}