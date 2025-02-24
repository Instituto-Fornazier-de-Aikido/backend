export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at?: string;
}

export type AppPageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    auth: {
        user: User;
    };
};
