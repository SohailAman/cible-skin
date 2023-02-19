export async function request(url, method = 'GET', body, responseIsJSON = true)
{
    try {
        const response = await fetch(url, {
            method,
            body: body ? JSON.stringify(body) : undefined,
            headers: {
                'Content-Type': 'application/json'
            }
        });

        const { ok, status, statusText } = response;
        if (!ok) {
            throw { code: status, message: statusText };
        }

        if (responseIsJSON) {
            const json = await response.json();
            const { error, data } = json;

            if (error) {
                throw error;
            }

            return data;
        } else {
            const data = response.text();

            return data;
        }
    } catch (err) {
        console.error(err);
        throw err;
    }
}