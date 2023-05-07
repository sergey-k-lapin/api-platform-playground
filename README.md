# Bank API

The API will be here.

Refer to the [Getting Started Guide](https://api-platform.com/docs/distribution) for more information.

Test queries:
{
    bank(id: "/banks/1") {
        legalName
        address,
        accounts{
            totalCount,
            edges{
                node{
                    identifier,
                    person{
                    givenName,
                    familyName
                }
            }
        }
    }
}


======================
{
    person(id: "/people/1"){
        givenName,
        accounts{
            edges{
                node{
                    identifier,
                    bank{
                        legalName
                    }
                }
            }
        }
    }
}