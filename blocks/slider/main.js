var el = wp.element.createElement,
    registerBlockType = wp.blocks.registerBlockType,
    blockStyle = { backgroundColor: '#900', color: '#fff', padding: '20px' };

const getImageButton = (openEvent) => {
    if(attributes.imageUrl) {
        return (
            <img
                src={ attributes.imageUrl }
                onClick={ openEvent }
                className="image"
            />
        );
    }
    else {
        return (
            <div className="button-container">
                <Button
                    onClick={ openEvent }
                    className="button button-large"
                >
                    Pick an image
                </Button>
            </div>
        );
    }
};

registerBlockType( 'gutenberguest/slider', {
    title: 'Guten Slider',

    icon: 'format-video',

    category: 'layout',

    attributes: {
        imageAlt: {
            attribute: 'alt',
            selector: '.card__image'
        },
        imageUrl: {
            attribute: 'src',
            selector: '.card__image'
        }
    },

    edit: function({ attributes, className, setAttributes }) {
        return (
            <div className='container'>
                <MediaUpload
                    onSelect={ media => { setAttributes({ imageAlt: media.alt, imageUrl: media.url }); } }
                    type="image"
                    value={ attributes.imageID }
                    render={ ({ open }) => getImageButton(open) }
                />
            </div>
        );
    },

    save: function() {
        const cardImage = (src, alt) => {
            if(!src) return null;

            if(alt) {
                return (
                    <img
                        className="card__image"
                        src={ src }
                        alt={ alt }
                    />
                );
            }

            // No alt set, so let's hide it from screen readers
            return (
                <img
                    className="card__image"
                    src={ src }
                    alt=""
                    aria-hidden="true"
                />
            );
        };

        return (
            <div className="card">
                { cardImage(attributes.imageUrl, attributes.imageAlt) }
                <div className="card__content">
                    <h3 className="card__title">{ attributes.title }</h3>
                    <div className="card__body">
                        { attributes.body }
                    </div>
                </div>
            </div>
        );
    },
} );